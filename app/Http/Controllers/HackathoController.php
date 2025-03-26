<?php

namespace App\Http\Controllers;

use App\Models\Hackthon;
use App\Models\Role;
use Illuminate\Http\Request;

class HackathoController extends Controller
{
    

    public function store(Request $request){
        $request->validate([
            "description"=>"required|string|max:255",
            "name"=>"required",
            "image"=>"required",
        ]);

        $role = Role::find(auth()->user()->role_id);
        if($role->name != 'organisteur'){
            return response()->json([
                'status' => "you can't create hackathon",
            ], 403);
        }

        $hackathon = new Hackthon();
        $hackathon->description = $request->description;
        $hackathon->organisteur_id = auth()->user()->id;
        $hackathon->name = $request->name;
        $hackathon->image = $request->image;
        $hackathon->save();
        return response()->json([
            'status' => "create hackathon by seccessfully",
            'hackathon' => $hackathon
        ], 201);
    }
}