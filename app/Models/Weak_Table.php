<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weak_Table extends Model
{
    use HasFactory;
    protected $table='weak_tables';
    protected $fillable=['day','class_id','subject','time'];

public function class(){
    return $this->hasMany(ClassRoom::class,'class_id');

        }
    }
