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
        'user_id', 'token'
    ];

    /**
     * Get the user that owns the verification
     */
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
