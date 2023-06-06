<?php

namespace App\Http\Controllers\User\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\User\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(
        UserRepository $userRepository
    ){
        $this->middleware('permission:user-index|user-store|user-update|user-destroy', ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:user-store', ['only' => ['store']]);
        $this->middleware('permission:user-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-destroy', ['only' => ['destroy']]);
        $this->userRepository = $userRepository;
    }

    public function index(){
        $role = $this->userRepository->role();
        return view('dashboard.user.index', compact('role'));
    }

    public function data(Request $request){
        $data = $this->userRepository->index($request);
        return $data;
    }

    public function show($id){
        $data = $this->userRepository->show($id);
        return $data;   
    }

    public function store(Request $request){
        if($request->id != ''){
            $data = $this->userRepository->update($request, $request->id);
            return $data;   
        } else {
            $data = $this->userRepository->store($request);
            return $data;   
        }
    }

    public function destroy($id){
        $data = $this->userRepository->destroy($id);
        return $data;
    }
}
