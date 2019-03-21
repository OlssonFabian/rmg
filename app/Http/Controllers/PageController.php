<?php

namespace App\Http\Controllers;

use Auth;
use App\Article;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome() {
	    $msg = "Please make a registration to use our services";

	    if (Auth::check()) {
		    $user = Auth::user();

		    $msg = "You are logged in as {$user->name}!";
		}

    return view('welcome', ['msg' => $msg, 'articles' => Article::all(), 'categories' => Category::all()]);
    }

    public function showCategory(Category $category)
    {
        return view('categories/index', [
            'articles' => $category->articles,
            'today' => Carbon::now()->toDateString(),
        ]);
    }
}
