<?php

namespace Responsive\Exceptions\Auth;

use Exception;

class VerificationTokenMismatchException extends Exception
{
    /**
     * The exception description
     *
     * @var string
     */
    protected $message = 'Wrong verification token';
}