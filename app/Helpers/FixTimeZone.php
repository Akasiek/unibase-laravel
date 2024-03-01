<?php

namespace App\Helpers;

use DateTime;
use Exception;

class FixTimeZone
{
    /**
     * Vue returns date in UTC timezone, so we need to change it to Europe/Warsaw timezone
     */
    public static function call(string $date): ?string
    {
        try {
            $date = new DateTime($date);
        } catch (Exception) {
            return null;
        }

        $date->setTimezone(new \DateTimeZone('Europe/Warsaw'));

        return $date->format('Y-m-d H:i:s');

    }
}
