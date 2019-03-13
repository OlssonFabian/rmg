<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome(Article $article, Category $category) {
		$msg = "Please make a registration to use our services";

		$articles = $article->all();
		$categories = $category->all();

		if (Auth::check()) {
			$user = Auth::user();

			$msg = "You are logged in as {$user->name}!";
		}

		return view('welcome', ['msg' => $msg, 'articles' => $articles, 'categories' => $categories]);
	}
}
