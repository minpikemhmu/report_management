<?php

namespace App\Exceptions;

use Exception;

class FieldException extends Exception
{
    protected $message = 'Fields cannot be created if there are already 40 or more fields.';
    protected $code = 422; // You can choose an appropriate HTTP status code
}
