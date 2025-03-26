<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function validEquip(Request $request){
        $request->validate([
            'equipe_id' => 'required'
        ]);
        
        $equipe = Equipe::find($request->equipe_id);
        if($equipe->status_id == 2){
            return response()->json([
                'status' => 'already valid'
            ]);
        }
        $equipe->status_id = 2;
        $equipe->save();
        return response()->json([
            'status' => 'change status to valid by successflly'
        ]);
    }
    
    public function blockEquip(Request $request){
        $request->validate([
            'equipe_id' => 'required'
        ]);
        
        $equipe = Equipe::find($request->equipe_id);
        if($equipe->status_id != 2){
            return response()->json([
                'status' => 'already not valid'
            ]);
        }
        $equipe->status_id = 1;
        $equipe->save();
        return response()->json([
            'status' => 'change status to block by successflly'
        ]);
    }
}
