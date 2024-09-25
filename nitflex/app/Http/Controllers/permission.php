<?php

namespace App\Http\Controllers;

use App\Models\Permission as ModelsPermission;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class permission extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.roles.permission");
    }



    public function data(){
        $roles = ModelsPermission::all();

        return DataTables::of($roles)
            // ->addColumn('checkbox', 'admin.roles.dataTable.checkbox')
             ->addColumn('action', 'admin.roles.dataTable.action')
            ->editColumn('created_at', function ($roles) {
                return $roles->created_at->format('d-m-y');
            })
            ->editColumn('updated_at', function ($roles) {
                return $roles->created_at->format('d-m-y');
            })
            // ->rawColumns(['action', 'checkbox'])
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
