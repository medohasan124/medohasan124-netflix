<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
