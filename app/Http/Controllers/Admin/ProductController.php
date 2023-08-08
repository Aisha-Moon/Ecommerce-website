<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function showProductForm(){
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = SubCategory::orderBy('id', 'desc')->get();
        $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.product.add',compact('categories','subcategories','brands'));
    }
    public function createProduct(Request $request){
        
        $this->validate($request, [
        'name'=>'required|unique:products',
        'price'=>'required',
        'quantity'=>'required',
        'short_desc'=>'required',
        'long_desc'=>'required',
        'image'=>'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    ]);

        $image = $request->file('image');
        $img_name =time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('upload/',$img_name);
       

        $category_id = $request->category_id;
        $subcategory_id = $request->subcategory_id;
        $brand_id = $request->brand_id;

        $category_name = Category::where('id', $category_id)->value('name');   
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('name');   
        $brand_name = Brand::where('id', $brand_id)->value('name');   

        Product::create([
            'category_id'=>$request->category_id,
            'sub_category_id'=>$request->subcategory_id,
            'brand_id'=>$request->brand_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'discounted_price'=>$request->discounted_price,
            'quantity'=>$request->quantity,
            'short_description'=>$request->short_desc,
            'long_description'=>$request->long_desc,
            'image'=>$img_name,
            'slug'=>Str::slug($request->name),

        ]);
        return redirect('/product/manage')->with('success','Product has been created'); 
    }
     public function showProductList(){

          $products = Product::orderBy('id', 'desc')->get();
        return view('backend.product.manage',compact('products'));
   }
   public function EditProduct($id){
          $product = Product::with('category','brand')->find($id);
          $categories = Category::orderBy('id', 'desc')->get();
          $subcategories = SubCategory::orderBy('id', 'desc')->get();
          $brands = Brand::orderBy('id', 'desc')->get();

        return view('backend.product.edit',compact('product','categories','subcategories','brands'));
   }
    public function UpdateProduct(Request $request,$id){

      $this->validate($request, [
        'name'=>'required',
        'price'=>'required',
        'quantity'=>'required',
        'short_desc'=>'required',
        'long_desc'=>'required',
        'image'=>'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    ]);
        $product = Product::with('category','brand')->find($id);

    if($request->hasFile('image')){
        if(file_exists(public_path('upload/'.$product->image))){
                File::delete(public_path('upload/' . $product->image));
                $updateImg =time() . '.' . $request->image->extension();
              $request->image->move('upload/',$updateImg);
                $product->image = $updateImg;
        }else{
             $updateImg =time() . '.' . $request->image->extension();
              $request->image->move('upload/',$updateImg);
             $product->image = $updateImg;
        }
    }
    
    $product->update([
           'category_id'=>$request->category_id,
            'sub_category_id'=>$request->subcategory_id,
            'brand_id'=>$request->brand_id,
            'name'=>$request->name,
            'price'=>$request->price,
            'discounted_price'=>$request->discounted_price,
            'quantity'=>$request->quantity,
            'short_description'=>$request->short_desc,
            'long_description'=>$request->long_desc,
    ]);

          return redirect('/product/manage')->with('success','product has been updated');
   }

   public function editProductImage($id){

             $product = Product::find($id);
        return view('backend.product.editImage', compact('product'));
   }
     public function DeleteProduct($id){
           $product = Product::find($id);
          $product->delete();
          return redirect()->back()->with('success','product has been deleted');

   }
   public function updateProductImage(Request $request){
         $this->validate($request, [
        
        'image'=>'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
    ]);

        $id = $request->id;
        $image = $request->file('image');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->image->move('upload',$img_name);
        

        Product::find($id)->update([
                'image'=>$img_name,
        ]);
                  return redirect('/product/manage')->with('success','product image has been updated');

   }
}
