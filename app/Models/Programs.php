<?php

namespace App\Models;

use App\Traits\TimestampLocalized;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programs extends Model
{
    use HasFactory;
    use TimestampLocalized;

    protected $fillable = [
        'prog_name',
        'prog_category',
        'instructor',
        'prog_image',
        'link',
        'popular',
        'desc',
        'silabus',
        'price_desc',
        'qualification',
        'created_by',
        'updated_by',
    ];

    public function category()
    {
        return $this->belongsTo(ProgramsCategory::class, 'prog_category');
    }

    public function join_instructor()
    {
        return $this->belongsTo(Instructors::class, 'instructor');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
