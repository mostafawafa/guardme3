<?php

namespace Responsive;

use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Responsive\Exceptions\Auth\UserIsVerifiedException;
use Responsive\Exceptions\Auth\UserIsNotVerifiedException;
use Laravel\Passport\HasApiTokens;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender',
        'admin', 'phone', 'photo', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the verification record associated with the user.
     */
    public function verification()
    {
        return $this->hasOne(VerifyUser::class);
    }

    /**
     * Find user by verification token
     *
     * @param $token
     * @return object
     */
    public static function findByVerificationToken($token)
    {
        return static::leftJoin('verify_users', 'users.id', '=', 'verify_users.user_id')
                     ->select('users.*', 'verify_users.token as verification_token')
                     ->where('verify_users.token', $token)
                     ->firstOrFail();
    }

    /**
     * Update and save the model instance with the verification token.
     *
     * @return object|boolean
     */
    public function generateToken()
    {
        // if current user has no email, throw an error
        if (empty($this->email)) {
            throw new \Exception("The given user instance has an empty or null email field");
        }

        // Update current verified to false first
        $this->update([
            'verified' => false
        ]);

        // delete token first if exists
        $this->verification()->delete();

        // Generate token and save it to database
        $this->verification()->create([
            'token' => $token = $this->token()
        ]);

        return $token;
    }

    /**
     * Verify the user
     *
     * @return void
     */
    public function processVerify()
    {
        $this->checkVerifiedStatus();

        // update verified status
        $this->update([
            'verified' => true
        ]);

        // delete stored token
        $this->verification()->delete();
    }

    /**
     * Check if the user is verified
     *
     * @return void
     *
     * @throws \Responsive\Exceptions\Auth\UserIsVerifiedException
     */
    public function checkVerifiedStatus()
    {
        if ($this->verified) {
            throw new UserIsVerifiedException();
        }
    }

    /**
     * Check if the user is not verified
     *
     * @return void
     *
     * @throws \Responsive\Exceptions\Auth\UserIsNotVerifiedException
     */
    public function checkUnverifiedStatus()
    {
        if (! $this->verified) {
            throw new UserIsNotVerifiedException();
        }
    }

    /**
     * set current user email to unverified
     *
     * @return void
     */
    public function setAsUnverified()
    {
        $this->checkUnverifiedStatus();

        $this->update([
            'verified' => false
        ]);
    }

    /**
     * Generate the verification token.
     *
     * @return string
     */
    private function token()
    {
        return hash_hmac('sha256', Str::random(40), config('app.key'));
    }



    /**
     * Get One Time Password (valid for 5 minutes).
     *
     * @return string
     */
    public function getOTP()
    {
        $now      = Carbon::now();
        $lifetime = 300; // 5 minutes
        $periods  = intdiv($now->timestamp - $now->copy()->startOfDay()->timestamp, $lifetime);
        $unique   = $now->toDateString() . $lifetime * $periods . $this->phone;
        $password = hash_hmac('sha512', $unique, config('app.key'));

        return substr(strtoupper($password), 0, 5);
    }

}
