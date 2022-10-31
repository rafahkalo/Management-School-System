<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Final_Exam extends Model
{
    use HasFactory;
    protected $fillable=['day','subject','time','class_id'];

    public function class(){
        return $this->belongsTo(ClassRoom::class,'class_id');

            }
}
