<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    public function __construct() {

        $this->middleware('auth:api')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $products = Product::Paginate(30); // We are retriving the table data from the product data model

      return ProductCollection::collection($products); // We use Product Resource to style how we want our json to be printed out
      // We dont return new because we dont want 1, we want a whole bunch of products
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = new Product();

        $product->name     = $request->input('name');
        $product->detail   = $request->input('description');
        $product->price    = $request->input('price');
        $product->stock    = $request->input('stock');
        $product->discount = $request->input('discount');

        $product->save();

        return response( [
          'data' => new ProductResource($product) // returns as a product rescource to pretty the JSON
        ], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $findproduct = Product::findOrFail($id);
        if($findproduct) {
        return new ProductResource($findproduct);

      }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product) // the parametres are there to retrieve already existing information
    {
      //  $product->update($request->all()); another way to do it, with Product as the parametre

      $request['detail'] = $request->description;

      unset($request['description']);

      $product->update($request->all());

        return response([
          'data' => new ProductResource($product)
        ], Response::HTTP_CREATED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product) // The number we search for if it matches an available product
    {
  
      if($product->delete()) {
        return response(null,Response::HTTP_NO_CONTENT);
      }

    }

  }
