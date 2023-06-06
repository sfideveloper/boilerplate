<?php

namespace App\Repositories\User\Blog;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helper\Response;
use App\Models\BlogCategory;
use App\Models\Blog;

class KategoriRepository {
    
    private $response;
    private $kategori;
    private $blog;

    public function __construct(
        Response $response,
        BlogCategory $kategori,
        Blog $blog
    ){
        $this->response = $response;
        $this->kategori = $kategori;
        $this->blog = $blog;
    }

    function slug($text, $id){
        $text = Str::slug($text);
        $count = 0;
        $first_data = $this->kategori->where('id', '!=', $id)->where('slug', $text)->first();
        if(!empty($first_data)){
            while(true){
                $count++;
                $new_slug = $text.'-'.($count);
                $future_data = $this->kategori->where('slug', $new_slug)->first();
                if(empty($future_data)){
                    return $new_slug;
                    break;
                }
            }
        } else {
            return $text;
        }
    }

    function validate(){
        $request = [
            'nama' => 'required|string',
            'gambar' => 'required|string',
        ];
        return $request;
    }

    function request($request){
        $data = [
            'nama' => $request['nama'],
            'gambar' => str_replace(url('/'), '', $request['gambar']),
            'slug' => $this->slug($request['nama'], $request['id'])
        ];
        return $data;
    }

    public function index($request){
        $data = [];
        if($request['search'] == ''){
            $data = $this->kategori->where('nama', 'like', '%'.$request['search'].'%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $data = $this->kategori->orderBy('id', 'desc')->paginate(10);
        }
        return $this->response->index($data);
    }

    public function show($id){
        $data = $this->kategori->find($id);
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
                $data = $this->kategori->create($this->request($request));   
                if(!$data){
                    return $this->response->storeError();
                } else {
                    return $this->response->store($data);
                }
            } else {
                $gambar_old = $this->kategori->where('id', $request['id'])->value('gambar');
                $data = $this->kategori->where('id', $request['id'])->update($this->request($request));
                if(!$data){
                    return $this->response->updateError();
                } else {
                    $this->blog->where('thumbnail', $gambar_old)->update(['thumbnail' => $request['gambar']]);
                    return $this->response->update($data);
                }
            }
        }
    }

    public function destroy($id){
        $check = $this->kategori->find($id);        
        if(empty($check)){
            return $this->response->notFound();
        }
        $data = $this->kategori->find($id)->delete();
        if(!$data){
            return $this->response->destroyError();
        } else {
            return $this->response->destroy($data);
        }
    }
}