<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremovieRequest;
use App\Http\Requests\UpdatemovieRequest;
use App\Models\movie;
use Yajra\DataTables\Facades\DataTables;

class MovieController extends Controller
{
    public function __construct(){
        $this->middleware('permission:movie-read')->only('index');
        $this->middleware('permission:movie-create')->only('create');
        $this->middleware('permission:movie-update')->only('update','edit');
        $this->middleware('permission:movie-delete')->only('destroy','bulckDelete');
   }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.movie.index');
    }
    public function data(){
        $movie = movie::with(['genra']);

        return DataTables::of($movie)
             ->addColumn('checkbox', 'admin.movie.dataTable.checkbox')
             ->addColumn('action', 'admin.movie.dataTable.action')

            ->editColumn('poster', function ($movie) {
                return $movie->poster;
            })
            ->addColumn('genra', function($movie){
                return $movie->genra ;
             })
            ->editColumn('created_at', function ($movie) {
                return $movie->created_at->format('d-m-y');
            })
            ->editColumn('updated_at', function ($movie) {
                return $movie->created_at->format('d-m-y');
            })
             ->rawColumns(['action', 'checkbox'])
            ->toJson();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(movie $movie)
    {
        //
    }
}
