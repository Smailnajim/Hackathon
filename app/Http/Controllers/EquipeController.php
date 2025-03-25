<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipeController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'hackaton_id' => 'required|gte:0',
        ]);

        $user = User::find(auth()->user()->id);
        
        $equipes = $user->equipes;

        foreach($equipes as $equipe){
            if($equipe->hackaton_id == $request->hackaton_id){
                return response()->json([
                    'status' => 'you already in equipe in this hackathon.'
                ], 403);
            }
        }

        $equipe = Equipe::create([
            'hackaton_id' => $request->hackaton_id,
            'date_create' => now(),
        ]);
        auth()->user()->equipes()->attach($equipe->id, ['user_role' => 1]);


        return response()->json([
            'status'=>'create new equipe by seccessflly'
        ], 201);
    }   
    
    
}