<?php

namespace App\Repositories\User\RolePermission;

use Illuminate\Support\Facades\Validator;
use App\Helper\Response;
use Spatie\Permission\Models\Role;

class RoleRepository {
    protected $response;
    protected $role;

    public function __construct(
        Response $response,
        Role $role
    ){
        $this->response = $response;
        $this->role = $role;
    }

    function validate(){
        $request = [
            'name' => 'required|string',
        ];
        return $request;
    }

    function request($request){
        $data = [
            'name' => $request['name'],
        ];
        return $data;
    }

    public function index($request){
        $data = [];
        if($request['search'] == ''){
            $data = $this->role->withCount(['permissions', 'users'])->where('name', 'like', '%'.$request['search'].'%')->paginate(10);
        } else {
            $data = $this->role->withCount(['permissions', 'users'])->paginate(10);
        }
        return $this->response->index($data);
    }

    public function show($id){
        $data = $this->role->find($id);
        if(empty($data)){
            return $this->response->notFound();
        }
        return $this->response->show($data);
    }

    public function store($request){
        $validation = Validator::make($request->all(), $this->validate());
        if($validation->fails()){
            return $this->response->validationError($validation->errors());
        } else {   
            if($request['id'] == ''){
                $data = $this->role->create($this->request($request));   
                if(!$data){
                    return $this->response->storeError();
                } else {
                    return $this->response->store($data);
                }
            } else {
                $data = $this->role->where('id', $request['id'])->update($this->request($request));
                if(!$data){
                    return $this->response->updateError();
                } else {
                    return $this->response->update($data);
                }
            }
        }
    }

    public function destroy($id){
        $check = $this->role->find($id);        
        if(empty($check)){
            return $this->response->notFound();
        }
        $data = $this->role->find($id)->delete();
        if(!$data){
            return $this->response->destroyError();
        } else {
            return $this->response->destroy($data);
        }
    }
}