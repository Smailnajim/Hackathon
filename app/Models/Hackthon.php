<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hackthon extends Model
{
    use HasFactory;

    public function equipes(){
        return $this->hasMany(Equipe::class);
    }

    protected $table = 'hacktons';

    protected $fillable = [
        "description",
        "name",
        "image",
    ];
}
