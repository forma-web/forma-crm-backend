<?php

namespace App\Enums;

enum UserRolesEnum : string
{
    use Arrayable;

    case OWNER = 'owner';

    case SENIOR_MANAGER = 'senior_manager';

    case MANAGER = 'manager';
}
