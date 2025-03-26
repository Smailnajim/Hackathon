<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'hackaton_id',
        'date_create'
    ];

    public function user(){
        return $this->belongsToMany(User::class, 'user_equipe')->withPivot('user_role');
    }
    public function project(){
        return $this->hasOne(Project::class);
    }
    public function hackthon(){
        return $this->hasOne(hackthon::class);
    }
}
