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
    private const NEW = 'new';
    private const IN_PROCESS = 'inprocess';
    private const COMPLETED = 'completed';
    private const FAILED = 'failed';

}