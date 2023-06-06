<?php

namespace App\Http\Controllers\User\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\Blog\BlogRepository;

class BlogController extends Controller
{
	private $blogRepository;

    public function __construct(
        BlogRepository $blogRepository
    ){
        $this->middleware('permission:blog-index|blog-store|blog-update|blog-destroy', ['only' => ['index', 'show', 'data']]);
        $this->middleware('permission:blog-store', ['only' => ['store']]);
        $this->middleware('permission:blog-update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blog-destroy', ['only' => ['destroy']]);
        $this->blogRepository = $blogRepository;
    }

	public function index(){
		$kategori = $this->blogRepository->kategori();
		return view('dashboard.blog.index', compact('kategori'));
	}

	public function data(Request $request){
        $data = $this->blogRepository->index($request);
        return $data;
    }

    public function show($id){
        $data = $this->blogRepository->show($id);
        return $data;   
    }

    public function store(Request $request){
        $data = $this->blogRepository->store($request);
        return $data;   
    }

    public function destroy($id){
        $data = $this->blogRepository->destroy($id);
        return $data;
    }
}