<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Repositories\ArticlesRepository;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentsRequest;
use App\Comment;
use App\Article;

class CommentsController extends SiteController
{
public function __construct(\App\Repositories\MenusRepository $m_rep, \App\Repositories\CompaniesRepository $c_rep, ArticlesRepository $a_rep) {
    parent::__construct($m_rep, $c_rep, $a_rep);
     
}
    
    public function addcomment(Request $request) {
       if (Auth::user()) {
            if ($request->isMethod('POST')) {
                $id = $request['id'] ? intval($request['id']) : 0;
                $msg = $request['msg'];
                $art_id = intval($request['art_id']);
                $alias = Auth::user()->alias;
                $user_id = Auth::user()->id;
                $post = ['alias' => $alias, 'text' => $msg, 'parent' => $id, 'user_id' => $user_id];

                if ($comment = new \App\Comment($post)) {
                    $article = Article::find($art_id);
                    $article->comments()->save($comment);
                    $obj = Comment::where('article_id', $art_id)->orderBy('id', 'desc')->first();
                    $obj->count = count(Comment::where('article_id', $art_id)->get());
                    $obj->status = true;
                    return response()->json($obj);
                }
            }
        } else {
            $obj = new \stdClass();
            $obj->status = false;
            return response()->json($obj);
        }
    }

}
