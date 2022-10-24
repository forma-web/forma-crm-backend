<?php

namespace App\Enums;

enum UserSexEnum: string
{
    use Arrayable;

    case MAN = 'M';
    case WOMAN = 'W';
}
