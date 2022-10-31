<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class ClassRoom extends Model
{
    use HasFactory;

    protected $table="class_rooms";
    protected $fillable=['name','school-free'];

    public function student(){
return $this->hasMany('App\Models\Student','class_id');

    }
    public function weak(){
        return $this->hasMany(Weak_Table::class,'class_id');

            }
    public function final(){
        return $this->hasMany(Final_Exam::class,'class_id');

            }
    public function teacher(){

        return $this->belongsToMany(Teacher::class,'teacher_class','class_id','teacher_id');
    }


    public function homework(){
        return $this->hasMany(Homework::class,'class_id');

            }
    protected $hidden = [
        'created_at',
        "updated_at",
    ];





}
