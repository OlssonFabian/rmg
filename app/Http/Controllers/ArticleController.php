<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Article;
use App\Category;
class ArticleController extends Controller
{
    protected $validation_rules = [

        'name' => 'required|min:3',
        'description' => 'required|min:6',
        'rent_price' => 'required',
        'category_id' => 'required',
        'image_url' => 'required'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles/index', ['articles' => Auth::user()->articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles/create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        $validData = $request->validate($this->validation_rules);

        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->name = $validData['name'];
        $article->description = $validData['description'];
        $article->rent_price = $validData['rent_price'];
        $article->category_id = $validData['category_id'];
        $article->image_url = $validData['image_url'];

        $article->slug = str_slug($request->name);

        $latestSlug= 
            Article::whereRaw("slug RLIKE '^{$article->slug}(-[0-9]*)?$'")
                ->latest('id')
                ->pluck('slug');

        if ($latestSlug) {
            $pieces = explode('-', $latestSlug);
            $number = intval(end($pieces));
            $article->slug .= '-' . ($number + 1);

        }

        $article->save();

        return redirect('articles/create')->with('status', 'Your article is now up for rent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles/show', [
            'article' => $article,
            'town' => $article->user->town]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {

        return view('articles/edit', [
            'article' => $article,
            'categories' => Category::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validData = $request->validate($this->validation_rules);

        $article->name = $validData['name'];
        $article->description = $validData['description'];
        $article->rent_price = $validData['rent_price'];
        $article->category_id = $validData['category_id'];
        $article->image_url = $validData['image_url'];
    
        $article->save();

        return redirect('articles/')->with('status', 'Your article is updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {


/* $article->delete();

return redirect('articles/')->with('status', 'Article successfully deleted!'); */
    }
    public function filterByCategory($category) {
        $category = Category::find($category);
        return view('articles.category', ['category' => $category]);
    }
}
