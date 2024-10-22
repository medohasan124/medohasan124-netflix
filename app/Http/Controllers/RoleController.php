<?php

namespace App\Http\Controllers;

use App\Models\role;
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
        // $this->middleware('permission:roles_read')->only('index');
        // $this->middleware('permission:roles_create')->only('create');
        // $this->middleware('permission:roles_update')->only('update');
        // $this->middleware('permission:roles_delete')->only('delete');
    }
    public function index()
    {
        return view("admin.roles.index");
    }

    public function data(){
        $roles = role::all();

        return DataTables::of($roles)
             ->addColumn('checkbox', 'admin.roles.dataTable.checkbox')
             ->addColumn('action', 'admin.roles.dataTable.action')
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



        return view("admin.roles.create",compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateroleRequest $request, role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(role $role)
    {
        //
    }
    public function bulckDelete(Request $role)
    {
        dd($role);
    }
}
