<?php

namespace App\Services;

use Carbon\Carbon;

class FormatDatetimeService
{
    public static function formatDate(String $date): String {
        return Carbon::parse($date)->format('d/m/Y') . ' às ' . Carbon::parse($date)->format('H:i:s');
    }

    public static function formatTime(String $date): String {
        $minutes = Carbon::parse($date)->format('i');
        $hours = Carbon::parse($date)->format('H');

        $time = '';
        if ($hours > 0) {
            $time = $hours == 1 ? "$hours hora" : "$hours horas";

            if ($minutes > 0) {
                $time = $minutes == 1 ? "$time e $minutes minuto" : "$time e $minutes minutos";
            }
        }

        return $time;

        if ($minutes > 0) {
            $time = $minutes == 1 ? "$minutes minuto" : "$minutes minutos";
        }

        return $time;
    }
}
