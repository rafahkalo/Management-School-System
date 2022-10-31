<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resualt extends Model
{
    use HasFactory;
protected $table='resualts';
    protected $fillable=['student_id','class_id','mark','type','year','subject_id'];


    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }
    public function class()
    {
        return $this->belongsTo(Subject::class,'class_id');
    }
    public function student()
    {
        return $this->belongsTo(Student::class,'student_id');
    }






}
