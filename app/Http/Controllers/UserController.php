<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('user');
    }

    public function index(){
        $articles = new Article();
        $articles = $articles->get();

        $article = (object) [
            'id'        => null,
            'title'     => '',
            'details'   => ''
        ];

        return view('user.article.form', compact( 'article', 'articles'));
    }
}
