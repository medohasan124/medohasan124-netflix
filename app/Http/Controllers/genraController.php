<?php

namespace App\Http\Controllers;

use App\Models\genra;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class genraController extends Controller
{
    public function __construct(){
        $this->middleware('permission:genra-read')->only('index');
        $this->middleware('permission:genra-create')->only('create');
        $this->middleware('permission:genra-update')->only('update','edit');
        $this->middleware('permission:genra-delete')->only('destroy','bulckDelete');
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.genra.index');
    }
    public function data(){
        $genra = genra::all();
        return DataTables::of($genra)
             ->addColumn('checkbox', 'admin.genra.dataTable.checkbox')
             ->addColumn('action', 'admin.genra.dataTable.action')

            ->editColumn('created_at', function ($genra) {
                return $genra->created_at->format('d-m-y');
            })
            ->editColumn('updated_at', function ($genra) {
                return $genra->created_at->format('d-m-y');
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
    public function bulckDelete(Request $request){
        $data = $request['buclkDelete'][0] ;
        $numbers = explode(',', $data);
        $genra = genra::whereIn('id',$numbers)->get();
        foreach($genra as $row){
            $row->delete() ;
        }
        notify()->success(__('admin.delete_success'));
        return redirect()->route('admin.genra.index');
    }
}
