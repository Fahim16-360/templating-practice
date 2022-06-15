<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function relationshipTest(){
        //lazy loading
//        $categories = ProductCategory::all();
//  select * from product_categories;

//        foreach ($categories as $cat){
//            dd($cat->products);
            //select * from products where product_category_id =1
//        }
        //eager loading
//        $categories = ProductCategory::with('products')->get();
//           // select * from product_categories join products
//        dd($categories);

//        $products = Product::all();
//        dd($products[0]->productCategory);
        $products = Product::with('productCategory')->get();
        dd($products);
    }
}
