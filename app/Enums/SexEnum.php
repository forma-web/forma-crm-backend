<?php

namespace App\Enums;

enum SexEnum: string
{
    use Arrayable;

    case MAN = 'M';
    case WOMAN = 'W';
}
