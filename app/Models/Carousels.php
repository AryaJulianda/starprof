<?php

namespace App\Models;

use App\Traits\TimestampLocalized;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousels extends Model
{
    use HasFactory;
    use TimestampLocalized;
    protected $table = 'carousels';
    protected $fillable = [
        'text_1',
        'text_2',
        'image',
        'created_by',
        'updated_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
