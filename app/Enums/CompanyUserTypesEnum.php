<?php

namespace App\Enums;

enum CompanyUserTypesEnum: string
{
    use Arrayable;

    case OWNER = 'OWNER';
    case INVITED = 'INVITED';
    case CREATED_BY_OWNER = 'CREATED_BY_OWNER';
}
