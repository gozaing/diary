<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Repositories\PostRepository;

class PostController extends Controller
{
    /**
     * ポストリポジトリーインスタンス
     *
     * @var PostRepository
     */
    protected $posts;

    /**
     * 新しいコントローラインスタンスの作成
     *
     * @param PostRepository $posts
     * @return void
     */
    public function __construct(PostRepository $posts)
    {
        $this->middleware('auth');

        $this->posts = $posts;
    }

    /**
     * ユーザの全ポストをリスト表示
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        return view('posts.index', [
            'posts' => $this->posts->forUser($request->user()),
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
