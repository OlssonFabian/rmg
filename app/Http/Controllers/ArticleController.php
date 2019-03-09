<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Article;
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
    // return view('articles/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles/create');
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
        $article->save();

        return redirect('articles/create')->with('status', 'Your article is now up for rent!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
