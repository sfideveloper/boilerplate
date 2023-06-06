<?php

namespace App\Repositories\User\Blog;

use Illuminate\Support\Facades\Validator;
use App\Helper\Response;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogRepository {
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
        $count = 0;
        $first_data = $this->blog->where('id', '!=', $id)->where('slug', $text)->first();
        if(!empty($first_data)){
            while(true){
                $count++;
                $new_slug = $text.'-'.($count);
                $future_data = $this->blog->where('slug', $new_slug)->first();
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
            'judul' => 'required|string',
            'blog_category_id' => 'required',
            'keyword' => 'required|string',
            'konten' => 'required|string',
        ];
        return $request;
    }

    function request($request){
        $data = [
            'judul' => $request['judul'],
            'blog_category_id' => $request['blog_category_id'],
            'keyword' => $request['keyword'],
            'slug' => $this->slug($request['slug'], $request['id']),
            'konten' => $request['konten'],
        ];

        if(strpos($request['konten'], 'img src=') !== false){
            $display = explode('img src=', $request['konten']);
            $display = explode('"', $display[1]);
            $imgData = stripslashes($display[1]);
            $data['thumbnail'] = str_replace(url('/'), '', $imgData);
        } else {
            $thumbnail = $this->kategori->where('id', $request['blog_category_id'])->value('gambar');
            $data['thumbnail'] = $thumbnail;
        }

        return $data;
    }

    public function kategori(){
        return $this->kategori->get();
    }

    public function index($request){
        $data = [];
        if($request['search'] == ''){
            $data = $this->blog->with('blog_category')->where('judul', 'like', '%'.$request['search'].'%')->orderBy('id', 'desc')->paginate(10);
        } else {
            $data = $this->blog->with('blog_category')->orderBy('id', 'desc')->paginate(10);
        }
        return $this->response->index($data);
    }

    public function show($id){
        $data = $this->blog->find($id);
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
                $data = $this->blog->create($this->request($request));   
                if(!$data){
                    return $this->response->storeError();
                } else {
                    return $this->response->store($data);
                }
            } else {
                $data = $this->blog->where('id', $request['id'])->update($this->request($request));
                if(!$data){
                    return $this->response->updateError();
                } else {
                    return $this->response->update($data);
                }
            }
        }
    }

    public function destroy($id){
        $check = $this->blog->find($id);        
        if(empty($check)){
            return $this->response->notFound();
        }
        $data = $this->blog->find($id)->delete();
        if(!$data){
            return $this->response->destroyError();
        } else {
            return $this->response->destroy($data);
        }
    }
}