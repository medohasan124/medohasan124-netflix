<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\createRquest;
use App\Http\Requests\User\updateRquest;
use App\Http\Requests\UserRquest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('permission:users-read')->only('index');
        $this->middleware('permission:users-create')->only('create');
        $this->middleware('permission:users-update')->only('update','edit');
        $this->middleware('permission:users-delete')->only('destroy','bulckDelete');
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.users.index");
    }

    public function data(){
        $users = User::all();

        return DataTables::of($users)
             ->addColumn('checkbox', 'admin.users.dataTable.checkbox')
             ->addColumn('action', 'admin.users.dataTable.action')
             ->addColumn('role', function ($users) {
                return $users->roles->pluck('name')->first();
             })
            ->editColumn('created_at', function ($users) {
                return $users->created_at->format('d-m-y');
            })
            ->editColumn('updated_at', function ($users) {
                return $users->created_at->format('d-m-y');
            })
             ->rawColumns(['action', 'checkbox'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $roles = Role::all() ;
        return view('admin.users.create',compact('roles'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(createRquest $request)
    {
        $name =$request->name ;
        $email =$request->email ;
        $password = bcrypt($request->password) ;
        $roleId = $request->role ;

       $user =  User::create([
        'name' =>$name ,
        'email' =>$email ,
        'password' =>$password ,
        ]);

        $roleName =  Role::find($roleId)->name ;
        $user->addRole($roleName);
        notify()->success(Lang::get('admin.add_success'));
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);


        $roles = Role::all() ;
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRquest $request, string $id)
    {
        $role =$request->role ;
        $user =  User::find($id);
        $user->name = $request->name ;
        $user->email = $request->email ;

        if($request->password){
            $user->password = bcrypt($request->password) ;
        }
        $user->save() ;

        $user->roles()->detach();
        $user->addRole($role) ;


        notify()->success(Lang::get('admin.edit_success'));
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user =  User::find($id);
        $user->roles()->detach();
        $user->delete() ;
        notify()->success(Lang::get('admin.delete_success'));
         return redirect()->route('admin.users.index');
    }

    public function bulckDelete(Request $request){
        $data = $request['buclkDelete'][0] ;
        $numbers = explode(',', $data);
        $user = User::whereIn('id',$numbers)->get();
        foreach($user as $row){
            $row->roles()->detach();
            $row->delete() ;
        }
        notify()->success(__('admin.delete_success'));
        return redirect()->route('admin.users.index');
    }
}
