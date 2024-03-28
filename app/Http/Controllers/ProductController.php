<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct(protected Product $product){}

    public function createProduct(ProductRequest $request){
        $request->validated();

        $productDetails = [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ];

        if(!$this->product->create($productDetails)){
            return [
                'status' => 'failed',
                'status_code' => 400,
                'message' => 'Product creation failed'
            ];
        }

        return [
            'status' => 'success',
            'status_code' => 200,
            'message' => 'product creation successful'
        ];
    }


    public function getProduct($productId){
        if(!$product = $this->product->find($productId)){
            return [
                'status' => 'failed',
                'status_code' => 404,
                'message' => 'Product not found'
            ];
        }

        return [
            'status' => 'success',
            'status_code' => 200,
            'data' => $product
        ];
    }
    
    public function getProducts(){
        if(!$products = $this->product->all()){
            return [
                "status" => "Failed",
                "message" => "No product found"
            ];
        }

        return [
            "status" => "success",
            "message" => "Products found",
            "data" => $products
        ];
    }

    public function updateProduct($productId, Request $request){
        if(!$product = $this->product->find($productId)){
            return [
                'status' =>'failed',
                'status_code' => 404,
                'message' => 'Product not found',
            ];
        }

        $productDetails = [
            'name'=> $request->name,
            'decription'=> $request->decription,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
        ];


        if(!$product->update($productDetails)){
            return [
                'status' =>'failed',
                'status_code' => 400,
                'message' => 'Failed to update product',
            ];
        }

        return [
            'status' =>'success',
            'status_code' => 200,
            'data' => $product,
        ];
    }

    public function deleteProduct($productId){
        $product= $this->product->find($productId);

        if(!$product){
            return [
                'status' =>'failed',
                'message' => 'Could not find product',
            ];
        }

        if(!$product->delete()){
            return [   
                'status' =>'failed',
                'message' => 'Could not delete product',
            ];
        }

        return [
            'status' =>'success',
            'status_code' => 200,
            'message' => 'product Deleted',
        ];
    }
}
