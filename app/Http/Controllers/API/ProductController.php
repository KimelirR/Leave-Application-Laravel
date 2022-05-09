<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        if ($products) 
        {
            return response()->json(['products' => $products], 200);
        } 
        else 
        {
            return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'quantity' => 'required|max:191'
        ]);

        if ($validator->fails())
         {
            $errors = implode(" ", $validator->errors()->all());
            return response(['status' => 'error', 'message' => $errors]);
         }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        if ($product)
          {
            return response()->json(['message' => 'Product Added Successfully'], 200);
          }
        else
            {
                return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);
            }  

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        if ($products) 
        {
            return response()->json(['products' => $products], 200);
        } 
        else 
        {
            return response()->json(['message' => 'No Product associated with this id'], 404);
        }
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:191',
            'description' => 'required|max:191',
            'price' => 'required|max:191',
            'quantity' => 'required|max:191'
        ]);

        if ($validator->fails())
        {
           $errors = implode(" ", $validator->errors()->all());
           return response(['status' => 'error', 'message' => $errors]);
        }

        $product = Product::find($id);
        if ($product) {
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->update();

            return response()->json(['message' => 'Product updated Successfully'], 200);
        } 
        else 
        {
            return response()->json(['status' => 'error', 'message' => 'Technical error ocurred , contact administrator.'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product)
         {
            $product->delete();
            return response()->json(['message' => 'Product Deleted Successfully'], 200);
        }
         else 
        {
            return response()->json(['message' => 'No Product associated with this id.'], 404);
        }
    }
}
