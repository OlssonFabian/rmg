<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        dd($articles = Article::Where('category_id',$request)->get());
        return view('category/index', ['articles' => $articles = Article::Where('category_id',$request)]);
    }
}
