<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('products.index')
        ->withProducts(Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create')->withCategories(Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required', //
            'user_id' => 'required',
            'category_id' => 'required',
            // 'content' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ];

        // $messages = [
        //     'required' => 'el campo :attribute es requerido'
        // ];
       

        $this->validate($request, $rules);

        $product = new Product($request->all());
        
        if($request->file('image') !== null) {
            $file = $request->file('image')->store('uploads');
            $product->image = $file;
        }
        
        $product->save();

        return redirect('/products/' . $product->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return view('products.show')->withProduct(Product::findorFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit')->withProduct(Product::findorFail($id))
        ->withCategories(Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request, $id);
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,bmp,png'
        ];

        $this->validate($request, $rules);
        $product = Product::find($id);
        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
        $product->price = $request->input('price');
        $product->status = $request->input('status');
        $product->user_id = $request->input('user_id');

        if($request->has('image')){
            $product->image = $request->file('image')->store('uploads');
        } 

        $product->save();
        
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect('/products');
    }
}
