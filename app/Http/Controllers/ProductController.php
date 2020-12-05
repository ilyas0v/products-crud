<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\ProductCategory;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all(); // SELECT * FROM products;
 

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = ProductCategory::all();

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [

            'name'               => 'required|string|max:100|min:5',
            'short_description'  => 'required|string|max:500|min:10',
            'text'               => 'required|string|max:50000|min:10',
            'previous_price'     => 'numeric|nullable',
            'price'              => 'required|numeric',
            'weight'             => 'required|numeric',
            'shipping_days'      => 'required|numeric',
            'shipping_cost'      => 'required|numeric',
            'status'             => 'required|boolean',
            'image'              => 'required|image|mimes:png,jpeg,jpg,gif,svg|max:5000',

            'category_id'        => 'required|integer|exists:product_categories,id',
        ]);

        $product          = new Product();

        $product->name                 = $request->name;
        $product->short_description    = $request->short_description;
        $product->text                 = $request->text;
        $product->previous_price       = $request->previous_price;
        $product->price                = $request->price;
        #$product->discount_percent     = $request->discount_percent;
        $product->weight               = $request->weight;
        $product->shipping_days        = $request->shipping_days;
        $product->shipping_cost        = $request->shipping_cost;
        $product->status               = $request->status;

        $product->category_id          = $request->category_id;

        if(!empty($request->previous_price) && !empty($request->price))
        {
            $diff = $request->previous_price -  $request->price;

            if($diff > 0)
            {
                $product->discount_percent = floor(($diff / $request->previous_price) * 100);
            }
        }



        if($request->hasFile('image')) {
            
            $product->image   =    $request->file('image')->hashName();

            $request->image->storeAs('products', $product->image, 'public');
       }



        $product->save(); // INSERT INTO products(...) VALUES (...)

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id); //  SELECT * FROM products WHERE id  = $id;

        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = ProductCategory::all();

        return view('admin.products.edit', compact('product', 'categories'));
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
        //dd($request->all());


        $this->validate($request, [

            'name'               => 'required|string|max:100|min:5',
            'short_description'  => 'required|string|max:500|min:10',
            'text'               => 'required|string|max:50000|min:10',
            'previous_price'     => 'numeric|nullable',
            'price'              => 'required|numeric',
            'weight'             => 'required|numeric',
            'shipping_days'      => 'required|numeric',
            'shipping_cost'      => 'required|numeric',
            'status'             => 'required|boolean',
            'image'              => 'nullable|image|mimes:png,jpeg,jpg,gif,svg|max:5000',

            'category_id'        => 'required|integer|exists:product_categories,id',
        ]);

        $product = Product::findOrFail($id);

        $product->name                 = $request->name;
        $product->short_description    = $request->short_description;
        $product->text                 = $request->text;
        $product->previous_price       = $request->previous_price;
        $product->price                = $request->price;
        $product->discount_percent     = $request->discount_percent;
        $product->weight               = $request->weight;
        $product->shipping_days        = $request->shipping_days;
        $product->shipping_cost        = $request->shipping_cost;
        $product->status               = $request->status;

        $product->category_id          = $request->category_id;

        if(!empty($request->previous_price) && !empty($request->price))
        {
            $diff = $request->previous_price -  $request->price;

            if($diff > 0)
            {
                $product->discount_percent = floor(($diff / $request->previous_price) * 100);
            }
        }



        if($request->hasFile('image')) {
            
            $product->image   =    $request->file('image')->hashName();

            $request->image->storeAs('products', $product->image, 'public');
       }


       $product->save();


       return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index');
    }
}
