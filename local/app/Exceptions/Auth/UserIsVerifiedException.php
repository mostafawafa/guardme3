<?php

namespace Responsive\Exceptions\Auth;

use Exception;

class UserIsVerifiedException extends Exception
{
    /**
     * The exception description
     *
     * @var string
     */
    protected $message = 'This user is already verified';
}