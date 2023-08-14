<?php

namespace App\Exceptions;

use Exception;

class UncompletedSubtasksException extends Exception
{
    protected $message = 'Cannot update status due to uncompleted subtasks.';
}
