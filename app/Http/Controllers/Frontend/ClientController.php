<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ClientController extends Controller
{
   public function SubCategoryPage($id){
          $subcategory = SubCategory::find($id);
          $products = Product::where('sub_category_id', $id)->latest()->get();
        return view('frontend.subcategory',compact('subcategory','products'));
   }
   public function CategoryPage($id){
               $category = Category::find($id);
          $products = Product::where('category_id', $id)->latest()->get();
        return view('frontend.category',compact('category','products'));
   }
   public function SingleProduct($id){
        $categories = Category::with('subcategories')->orderBy('id','desc')->get();
        $product = Product::find($id);
          $category = Category::find($id);
      $products = Product::where('category_id', $id)->latest()->get();
          $subcategory_id = Product::where('id', '$id')->value('sub_category_id');
          $related_products = Product::where('sub_category_id', $subcategory_id)->latest()->get();

        return view('frontend.product',compact('categories','product','category','products','related_products'));
   }
   public function AddToCart(){
        return view('frontend.addToCart');
   }
   public function CheckOut(){
        return view('frontend.checkout');
   }
   public function userProfile(){
        return view('frontend.userProfile');
   }
   public function Events(){
        return view('frontend.events');
   }
   public function AboutUs(){
        return view('frontend.aboutus');
   }
   public function BestDeals(){
        return view('frontend.bestdeals');
   }
   public function Services(){
        return view('frontend.services');
   }
   
}
