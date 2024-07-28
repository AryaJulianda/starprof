<?php

namespace App\Models;

use App\Traits\TimestampLocalized;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    use TimestampLocalized;

    protected $fillable = [
        'program',
        'tanggal',
        'waktu_from',
        'waktu_to',
        'lokasi',
        'seat_tersisa',
        'status',
        'created_by',
        'updated_by',
    ];

    // Define any relationships, if needed
    public function program()
    {
        return $this->belongsTo(Programs::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getFormattedTanggalAttribute()
    {
        $dates = explode(',', $this->tanggal);
        $formattedDates = [];

        foreach ($dates as $date) {
            $formattedDates[] = Carbon::createFromFormat('Y/m/d', trim($date))->format('d');
        }

        $monthYear = Carbon::createFromFormat('Y/m/d', trim($dates[0]))->format('F Y');

        return implode(', ', array_slice($formattedDates, 0, -1)) . ' & ' . end($formattedDates) . ' ' . $monthYear;
    }
}
