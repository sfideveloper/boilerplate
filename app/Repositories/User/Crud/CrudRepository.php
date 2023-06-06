<?php

namespace App\Repositories\User\Crud;

use Illuminate\Support\Facades\Validator;
use App\Helper\Response;
use App\Models\Crud;

class CrudRepository {

    private $response;
    private $crud;

    public function __construct(
        Response $response,
        Crud $crud
    ){
        $this->response = $response;
        $this->crud = $crud;
    }

    function validate(){
        $request = [
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
        ];
        return $request;
    }

    function request($request){
        $data = [
            'judul' => $request['judul'],
            'deskripsi' => $request['deskripsi'],
        ];
        return $data;
    }

    public function index($request){
        $data = [];
        if($request['search'] == ''){
            $data = $this->crud->where('judul', 'like', '%'.$request['search'].'%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $data = $this->crud->orderBy('id', 'desc')->paginate(10);
        }
        return $this->response->index($data);
    }

    public function show($id){
        $data = $this->crud->find($id);
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
                $data = $this->crud->create($this->request($request));   
                if(!$data){
                    return $this->response->storeError();
                } else {
                    return $this->response->store($data);
                }
            } else {
                $data = $this->crud->where('id', $request['id'])->update($this->request($request));
                if(!$data){
                    return $this->response->updateError();
                } else {
                    return $this->response->update($data);
                }
            }
        }
    }

    public function destroy($id){
        $check = $this->crud->find($id);        
        if(empty($check)){
            return $this->response->notFound();
        }
        $data = $this->crud->find($id)->delete();
        if(!$data){
            return $this->response->destroyError();
        } else {
            return $this->response->destroy($data);
        }
    }
}