<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function project(){
        return $this->hasOne(Project::class);
    }
    public function hackthon(){
        return $this->hasOne(hackthon::class);
    }
}
