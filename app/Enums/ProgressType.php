<?php
/**
 * Created by PhpStorm.
 * User: Life
 * Date: 10.11.2018
 * Time: 0:37
 */

namespace App\Enums;

use MyCLabs\Enum\Enum;


class ProgressType extends Enum
{
    public const NEW = 0;
    public const IN_PROCESS = 1;
    public const COMPLETED = 2;
    public const FAILED = 3;

}