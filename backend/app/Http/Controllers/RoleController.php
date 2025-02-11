<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(){
        return view('roles.list');
    }

    public function create(){
        $permissions = Permission::orderBy('name','ASC')->get();
        return view('roles.create',['permissions' => $permissions]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3',
        ]); 

        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);

            if(!empty($request->permission)){
               foreach ($request->permission as $name){
                $role->givePermissionTo($name);
               }
            }

            return redirect()->route('roles.index')->with('success','Role Created Successfully');
        } else{
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
        
    }
}
