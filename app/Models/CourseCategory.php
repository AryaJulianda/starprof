<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TimestampLocalized;

class CourseCategory extends Model
{
    use HasFactory;
    use TimestampLocalized;
    protected $table = 'course_category';
}
