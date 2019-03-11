<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Article;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    protected $validation_rules = [
		'article_id' => 'required',
        'date_start' => 'required',
        'date_end' => 'required',

	];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::where('user_id', Auth::id())->get();  
        foreach($articles as $article) {
            $orders = Order::where('article_id', $article->id)->get();
            return view('orders/index', ['orders' => $orders]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles = Article::where('user_id', '!=', Auth::id())->get();
        return view('orders/create', ['articles' => $articles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valiData = $request->validate($this->validation_rules);

        $order = new Order();
        $order->article_id = $valiData['article_id'];
        $order->name = Auth::user()->name;
        $order->phone_nr = Auth::user()->phone_nr;
        $order->address = Auth::user()->address;
        $order->town = Auth::user()->town;
        $order->email = Auth::user()->email;
        $order->date_start = $valiData['date_start'];
        $order->date_end = $valiData['date_end'];
        $order->save();

        return redirect('/orders')->with('status', 'Order created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $id = Auth::id();
        $articles = Article::where('user_id', $id)->get();
        $category = $articles[0]->category;
        return view('orders/show', [
            'order' => $order,
            'articles' => $articles,
            'category' => $category
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
