<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public function result(){
        return $this->belongsTo(Result::class);
    }
    public function equipe(){
        return $this->hasOne(Equipe::class);
    }
}
