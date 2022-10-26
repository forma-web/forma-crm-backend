<?php

namespace App\Enums;

enum PermissionScopesEnum: string
{
    use Arrayable;

    case ALL = 'ALL';
    case COMPANY = 'COMPANY';
    case EMPLOYEE = 'EMPLOYEE';
}
