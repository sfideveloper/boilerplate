<?php

namespace App\Http\Controllers\User\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\Crud\CrudRepository;

class CrudController extends Controller
{

    private $crudRepository;

    public function __construct(
        CrudRepository $crudRepository
    ){
        $this->middleware('permission:crud-index|crud-store|crud-update|crud-destroy', ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:crud-store', ['only' => ['store']]);
        $this->middleware('permission:crud-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:crud-destroy', ['only' => ['destroy']]);
        $this->crudRepository = $crudRepository;
    }

    public function index(){
        return view('dashboard.crud.index');
    }

    public function data(Request $request){
        $data = $this->crudRepository->index($request);
        return $data;
    }

    public function show($id){
        $data = $this->crudRepository->show($id);
        return $data;   
    }

    public function store(Request $request){
        $data = $this->crudRepository->store($request);
        return $data;   
    }

    public function destroy($id){
        $data = $this->crudRepository->destroy($id);
        return $data;
    }
}
