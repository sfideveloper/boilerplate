<?php

namespace App\Repositories\User\User;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Helper\Response;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserRepository {

    private $response;
    private $user;

    public function __construct(
        Response $response,
        User $user,
        Role $role
    ){
        $this->response = $response;
        $this->user = $user;
        $this->role = $role;
    }

    public function role(){
        return $this->role->get();
    }

    public function index($request){
        $data = [];
        if($request["role"] != ''){
            $data = $this->user->where('email', 'like', '%'.$request['search'].'%')->where('name', 'like', '%'.$request['search'].'%')->whereHas("roles", function($q) use ($request){ $q->where("name", $request['role']); })->with('roles')->paginate($request['limit']);
        } else {
            $data = $this->user->where('email', 'like', '%'.$request['search'].'%')->where('name', 'like', '%'.$request['search'].'%')->with('roles')->paginate($request['limit']);
        }
        if(count($data) == 0){
            return $this->response->empty(); 
        }
        return $this->response->index($data);
    }

    public function show($id){
        $data = $this->user->with('roles')->find($id);
        if(empty($data)){
            return $this->response->notFound();
        }
        return $this->response->show($data);
    }

    public function store($request){
        $validateData = [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|string',
        ];

        $validation = Validator::make($request->all(), $validateData);

        if($validation->fails()){
            return $this->response->validationError($validation->errors());
        } else {
            $data = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $role = $this->role->where('name', $request['role'])->first();
            $data->syncRoles([$role->name]);

            if(!$data){
                return $this->response->storeError();
            } else {
                return $this->response->store($data);
            }
        }
    }

    public function update($request, $id){
        $data = $this->user->find($id);

        if(empty($data)){
            return $this->response->notFound();
        }

        $validateData = [
            'name' => "required|string",
            'email' => "required|email|unique:users,email,$id",
            'role' => 'required|string',
        ];

        $validation = Validator::make($request->all(), $validateData);

        if($validation->fails()){
            return $this->response->validationError($validation->errors());
        } else {
            $data = array();
            if($request->password == ''){ 
                $data = $this->user->where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);   
                $role = $this->role->where('name', $request['role'])->first();
                $user = $this->user->find($id);
                $user->syncRoles([$role->name]);
            } else {
                $data = $this->user->where('id', $id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
                $role = $this->role->where('name', $request['role'])->first();
                $user = $this->user->find($id);
                $user->syncRoles([$role->name]);
            }
            if(!$data){
                return $this->response->updateError();
            } else {
                return $this->response->update($data);
            }
        }
    }

    public function destroy($id){
        $check = $this->user->find($id);        
        if(empty($check)){
            return $this->response->notFound();
        }
        $data = $this->user->find($id)->delete();
        if(!$data){
            return $this->response->destroyError();
        } else {
            return $this->response->destroy($data);
        }
    }
}