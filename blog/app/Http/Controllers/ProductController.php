<?php

namespace App\Http\Controllers;

use App\Product;
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
        //Recuperation de touts les produits de la table
        $products = Product::orderBy('id','desc')->paginate(10);
        return view('crud.index')->with('products',$products);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //validation des champs
        $request->validate([
            'name'=>'required|string|min:2|max:255',
            'status'=>'required|between:0,1',
            'price'=>'required|integer',
            'image'=>'required|image',
            'description'=>'required|string',
        ]);
          //Televersement du fichiers images

       $path = $request->file('image')->store('public/products');
       $product = Product::create([
           'name' => $request->name,
            'status' =>$request->status,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$path,
            'rating'=>0,
       ]);
       return response()->json(['message'=>'produit crée avec succes']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,$id)
    {
    
        $product = Product::find($id);
        return view('crud.update')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {    
        //Validation 
        $request->validate([
            'name'=>'required|string|min:2|max:255',
            'status'=>'required|between:0,1',
            'price'=>'required|integer',
            'description'=>'required|string',
        ]);
        $product =Product::find($id);
       if($request->file('image')){
              $path = $request->file('image')->store('public/products');
              $product->name = $request->name;
              $product->status = $request->status;
              $product->price = $request->price;
              $product->description = $request->description;
              $product->image = $path;
       //Enregistrement des modifications
              $product->save();
              return redirect()->route('index')->with('message','produit modifié avec succes');
         
        }else{
            $product->name = $request->name;
            $product->status = $request->status;
            $product->price = $request->price;
            $product->description = $request->description;

            $product->save();
            return redirect()->back()->with('message','produit modifié avec succes');
        }
      
    
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('index')->with('message','produit supprimé avec success');

    }
}
