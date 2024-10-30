<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremovieRequest;
use App\Http\Requests\UpdatemovieRequest;
use App\Models\genra;
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
        $genra = genra::all();

        return view('admin.movie.index',compact('genra'));
    }
    public function data(){
        $movie = movie::with(['genra']);



        return DataTables::of($movie)
             ->addColumn('checkbox', 'admin.movie.dataTable.checkbox')
             ->addColumn('action', 'admin.movie.dataTable.action')
             ->addColumn('genra', function($movie){
                return view('admin.movie.dataTable.genra',compact('movie'));
             })
             ->editColumn('vote', function($movie){
                return view('admin.movie.dataTable.vote',compact('movie'));
             })
             ->editColumn('vote_count', function($movie){
                return view('admin.movie.dataTable.vote_count',compact('movie'));
             })

            ->editColumn('poster', function ($movie) {
                return view('admin.movie.dataTable.poster',compact('movie'));
            })

            ->editColumn('created_at', function ($movie) {
                return $movie->created_at->format('d-m-y');
            })
            ->editColumn('updated_at', function ($movie) {
                return $movie->created_at->format('d-m-y');
            })
             ->rawColumns(['action', 'checkbox','genra','poster','vote','vote_count'])
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
