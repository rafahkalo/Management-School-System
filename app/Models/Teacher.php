<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table="teacher";
    protected $fillable=['user_id','salary','experince','father','mother','address'];
    public function user(){

        return $this->belongsTo('App\Models\User');
    }
    public function subject(){

        return $this->belongsToMany(Subject::class,'teacher_subject','teacher_id','subject_id');
    }

    public function class(){

        return $this->belongsToMany(ClassRoom::class,'teacher_class','teacher_id','class_id');
    }

    // protected $hidden = [
    //     'created_at',
    //     "updated_at",
    // ];






}
