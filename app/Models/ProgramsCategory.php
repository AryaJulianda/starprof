<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\TimestampLocalized;

class ProgramsCategory extends Model
{
    use HasFactory;
    use TimestampLocalized;
    protected $table = 'programs_category';

    public function programs()
    {
        return $this->hasMany(Programs::class, 'prog_category');
    }
}
