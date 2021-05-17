<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','maths','science','history','total','term'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
