<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'delete articles']);

        // $role       = Role::findById(2);

        // $permission = Permission::findById(2);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $permission->removeRole($role);
        // $role->revokePermissionTo($permission);

        //GIVE ROLE OR PERMISSION TO MODELS
        // auth()->user()->givePermissionTo('create articles');
        // auth()->user()->assignRole('writer');
        // return  auth()->user()->permissions;
        // return auth()->user()->getPermissionsViaRoles();
        // return auth()->user()->getDirectPermissions();

        // get all permissions for the user, either directly, or from roles, or from both
        // return auth()->user()->getAllPermissions();

        // return User::role('writer')->get();
        // return User::permission('delete articles')->get();

        //model has no permission 'model_has_permission'
        // return auth()->user()->revokePermissionTo('create articles');

        //model has no rle 'model_has_role'
        return auth()->user()->removeRole('writer');

        return view('home');
    }
}
