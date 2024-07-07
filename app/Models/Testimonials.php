<?php

namespace App\Models;

use App\Traits\TimestampLocalized;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
    use TimestampLocalized;
    protected $table = 'testimonials';
    protected $fillable = [
        'name',
        'text',
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
