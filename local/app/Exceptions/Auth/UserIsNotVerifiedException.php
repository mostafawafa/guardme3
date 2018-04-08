<?php

namespace Responsive\Exceptions\Auth;

use Exception;

class UserIsNotVerifiedException extends Exception
{
    /**
     * The exception description
     *
     * @var string
     */
    protected $message = 'This user is not verified';
}