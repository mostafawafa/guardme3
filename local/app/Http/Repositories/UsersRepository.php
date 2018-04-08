<?php
/**
 * Created by PhpStorm.
 * User: Dennis
 * Date: 27/09/2017
 * Time: 09:39 AM
 */

namespace Responsive\Http\Repositories;


use Carbon\Carbon;
use Illuminate\Http\Response;
use Responsive\User;

    class UsersRepository
{
    /**
     * @var User
     */
    private $user;

    /**
     * UsersRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    
    /**
     * @param $user_id
     * @return User
     */
    public function getUserById($user_id)
    {
        return $this->user->find($user_id);
    }

    /**
     * @param $phone
     *
     * @return User
     */
    public function getUserByPhone($phone)
    {
        
       return $this->user->where('phone',$phone)->where('id','!=',auth('api')->id())->first();
    }



    /**
     * @param $username
     * @return User
     */
    public function getUserByUsername($username)
    {
        return $this->user->where('username', $username)->first();
    }

    
}