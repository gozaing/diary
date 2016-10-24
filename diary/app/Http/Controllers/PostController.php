<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * 新しいコントローラインスタンスの作成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * ユーザの全ポストをリスト表示
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        return view('posts.index');
        $posts = $request->user()->posts()->get();

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * 新ポスト追加
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        // ポスト作成処理
        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/posts');
    }

}
