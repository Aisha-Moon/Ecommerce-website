<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class BrandController extends Controller
{
      public function showBrandForm(){
        return view('backend.brands.add');
   }
   public function EditBrand($id){
          $Brand = Brand::find($id);
        return view('backend.brands.edit',compact('Brand'));
   }
   public function UpdateBrand(Request $request,$id){

     $this->validate($request, [
        'name'=>'required'
    ]);
          $Brand = Brand::find($id);
          $Brand->update([
               'name' => $request->name,
               'slug' => Str::slug($request->name),
          ]);
          return redirect()->back()->with('success','Brand has been updated');
   

   }
   public function showBrandList(){

          $brands = Brand::orderBy('id', 'desc')->get();
        return view('backend.brands.manage',compact('brands'));
   }
   public function createBrand(Request $request){

    $this->validate($request, [
        'name'=>'required'
    ]);

        Brand::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),

        ]);
        return redirect('/brands/manage')->with('success','Brand has been created');

   }
   public function DeleteBrand($id){
           $Brand = Brand::find($id);
          $Brand->delete();
          return redirect()->back()->with('success','Brand has been deleted');
   }

}
