<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{

    public function index(){

    }
    
    public function create(){

        return view('permissions.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:permissions|min:3',
        ]); 

        if ($validator->passes()) {
            dd('success');

        } else{
            return redirect()->route('permissions.create')->withErrors($validator)->withInput();
        }
    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
