<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * 複数歳入を行う属性
     *
     * @var array
     */
    protected $fillable = ['title', 'body'];

    /**
     * ポスト所有ユーザの取得
     */
    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
