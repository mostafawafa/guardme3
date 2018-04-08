<?php

namespace Responsive;

use Illuminate\Database\Eloquent\Model;

class VerifyUser extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'new_email'
    ];

    /**
     * Get the user that owns the verification
     */
    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function hasToken()
    {
        return $this->token ? true : false;
    }
}
