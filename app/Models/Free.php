<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Free extends Model
{
    use HasFactory;
    protected $fillable=['amount','paid','date_paid'];

    public function student(){
        return $this->belongsToMany(Student::class,'student_id');

            }
}
