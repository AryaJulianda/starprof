<?php
// app/Traits/TimestampLocalized.php

namespace App\Traits;

use Carbon\Carbon;

trait TimestampLocalized
{
    public function getCreatedAtAttribute($value)
    {
        Carbon::setLocale('id');
        return Carbon::parse($value)->translatedFormat('D, j M Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        Carbon::setLocale('id');
        return Carbon::parse($value)->translatedFormat('D, j M Y');
    }
}
