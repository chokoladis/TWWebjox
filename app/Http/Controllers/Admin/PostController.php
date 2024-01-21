<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\FileController;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create(){ 

        $categories = Category::all();

        return view('admin.post.create', compact('categories'));
    }

    public function store(StoreRequest $request){ 
        try {
            $fileController = new FileController();
            if ($fileMoodel = $fileController->store($request, 'preview')){
                $data = $request->validated();
                unset($data['preview']);
                $data['active'] = $data['active'] ?? 0;
                $data = array_merge($data,['file_id' => $fileMoodel->id]);

                if (Post::create($data)){
                    $msg = __('Пост успешно создан');
                    Session::flash('alert-class', 'alert-success');
                } else {
                    $msg = __('Ошибка создания поста');
                    Session::flash('alert-class', 'alert-danger');
                }
            } else{
                $msg = __('Ошибка загрузки превью');
                Session::flash('alert-class', 'alert-danger');
            }

            Session::flash('msg', $msg);
            $posts = Post::all();
            return redirect()->route('admin.post.index', compact('posts'));

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
