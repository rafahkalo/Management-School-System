<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    use HasFactory;
    protected $fillable=['class_id','subject_id','number_page','descreption'];
    public function class(){

        return $this->belongsToMany(ClassRoom::class,'class_id');
    }
    public function subject(){

        return $this->belongsToMany(Subject::class,'subject_id');
    }

}
