<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use App\Models\Role;
use App\Http\Requests\StoreroleRequest;
use App\Http\Requests\UpdateroleRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Html\Column;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct(){
         $this->middleware('permission:roles-read')->only('index');
         $this->middleware('permission:roles-create')->only('create');
         $this->middleware('permission:roles-update')->only('update','edit');
         $this->middleware('permission:roles-delete')->only('destroy','bulckDelete');
    }
    public function index()
    {

        // Display a success toast with no title


        return view("admin.roles.index");
    }

    public function data(){
        $roles = role::all();

        return DataTables::of($roles)
             ->addColumn('checkbox', 'admin.roles.dataTable.checkbox')
             ->addColumn('action', 'admin.roles.dataTable.action')
             ->addColumn('count' , function($roles){
                return $roles->users()->count();
                
             })
            ->editColumn('created_at', function ($roles) {
                return $roles->created_at->format('d-m-y');
            })
            ->editColumn('updated_at', function ($roles) {
                return $roles->created_at->format('d-m-y');
            })
             ->rawColumns(['action', 'checkbox'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */



    public function create()
    {

        $permissions = $this->permission();
        return view("admin.roles.create",compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        $role = role::create([
            'name' => $request->name,
        ]);
        foreach ($request->permissions as $key => $value) {
            if ($value == 'on') {
                $role->givePermission($key);
            }
        }
        notify()->success(__('admin.create_success'));
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {


        $ModelsRole = Role::find($role->id);
        $permissions = $this->permission();
        $permissionModalByRole = Role::find($role->id)->permissions;

        return view("admin.roles.edit",compact('ModelsRole','permissions','permissionModalByRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleUpdateRequest $request ,$id)
    {


        //update role and if has a new permissions add it

        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->detach();
        foreach ($request->permissions as $key => $value) {
            if ($value == 'on') {
                $role->givePermission($key);
            }
        }
        notify()->success(__('admin.update_success'));
        return redirect()->route('admin.roles.index');
    }

    public function permission(){



            $permissionModal = Permission::all();



        $permissions = [];

        // Define the total number of permissions each category should have
        $totalPermissions = 4;

        foreach ($permissionModal as $permission) {
            $name = explode('-', $permission->name);
            $permissions[$name[0]][$permission->id] = $permission->name;
        }

        // Fill categories with "null" values for missing permissions
        foreach ($permissions as $category => $perms) {
            $missingCount = $totalPermissions - count($perms);
            for ($i = 1; $i <= $missingCount; $i++) {
                $perms[$totalPermissions + $i] = "null";
            }
            $permissions[$category] = $perms;
        }



        return $permissions ;
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $role =  Role::find($id);
        $role->permissions()->detach();
        $role->delete() ;
        notify()->success(__('admin.delete_success'));
         return redirect()->route('admin.roles.index');
    }
    public function bulckDelete(Request  $request)
    {

        $data = $request['buclkDelete'][0] ;
        $numbers = explode(',', $data);
        $role = Role::whereIn('id',$numbers)->get();
        foreach($role as $row){
            $row->permissions()->detach();
            $row->delete() ;
        }
        notify()->success(__('admin.delete_success'));
        return redirect()->route('admin.roles.index');
    }
}
