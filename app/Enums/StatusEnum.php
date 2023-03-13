<?php

namespace App\Enums;

enum StatusEnum: string
{
    case INACTIVE = 'inactive';
    case INPROGRESS = 'inprogress';
    case COMPLETED = 'completed';
}
