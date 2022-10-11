<?php

namespace App\Enums;

enum DeviceEnum: string
{
    use Arrayable;

    case WEB = 'Web';
    case MOBILE = 'Mobile';
}
