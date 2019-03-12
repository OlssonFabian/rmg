<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Article;
use App\User;
use App\Category;
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
        return view('orders/index', [
            'ownOrders' => Auth::user()->outgoingOrders()->where('confirmed', 1)->get(),
            'orders' => Auth::user()->incomingOrders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders/create', [
            'articles' => Article::where('user_id', '!=', Auth::id())->get()
        ]);
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
        $order->user_id = Auth::id();
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
        $temp = $order->article()->get();
        return view('orders/show', [
            'order' => $order,
            'user' => Auth::user(),
            'articles' => Auth::user()->articles()->get(),
            'category' => $temp[0]->category()->get(),
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
        return view('orders/edit', ['order' => $order]);
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
        $valiData = $request->validate($this->validation_rules);

        $order->article_id = $valiData['article_id'];
        $order->date_start = $valiData['date_start'];
        $order->date_end = $valiData['date_end'];
        $order->confirmed = true;
        $order->save();
        return redirect('/orders/' . $order->id)->with('status', 'Order Confirmed!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/orders');
    }
}
