<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Models\Permissions;
use App\Models\Role;

class AdminRoleController extends Controller
{
    private $permission;
    private $role;
    public function __construct(Permissions $permission , Role $role)
    {
       $this->permission = $permission; 
       $this->role =$role;
    }
    public function index (){
        return view('backend.pages.role.index');
    }
    public function create (){
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        return view('backend.pages.role.create', compact('permissionParent'));
    }

    public function store( CreateRoleRequest $request ) {
        $roles = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name
        ]);
    }
}
