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


}
