<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'equipe_id' => 'required|gte:0',
        ]);

        

    }
}
