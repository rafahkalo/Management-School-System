<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;


    protected $fillable = ['class_id','user_id','mother','father','address'];





    public function user(){

        return $this->belongsTo('App\Models\User');
    }

    public function class(){
        return $this->belongsTo('App\Models\ClassRoom');

    }
    public function free(){

        return $this->hasMany('App\Models\Free','student_id');
    }
    public function absence(){

        return $this->hasMany(Absence::class,'student_id');
    }
    public function subject(){

        return $this->belongsToMany(Teacher::class,'marks','student_id','subject_id');
    }
    


    protected $hidden = [
        'created_at',
        "updated_at",
    ];

}
