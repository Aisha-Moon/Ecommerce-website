<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
     public function showSubcategoryForm(){
    $categories = Category::all();
        return view('backend.subcategory.add',compact('categories'));
   }
   public function EditSubcategory($id){
          $categories = Category::all();
         $subcategory = Subcategory::find($id);
        return view('backend.subcategory.edit',compact('categories','subcategory'));
   }
   public function UpdateSubcategory(Request $request,$id){

     $this->validate($request, [
        'name'=>'required',
        'category_id'=>'required'

        
    ]);
          $subcategory = Subcategory::find($id);
          $subcategory->update([
              'category_id' => $request->category_id,
               'name' => $request->name,
               'slug' => Str::slug($request->name),
          ]);
          return redirect('/subcategory/manage')->with('success','Subcategory has been updated');
   

   }
   public function showSubcategoryList(){
          $subcategories = Subcategory::with('category')->orderBy('id', 'desc')->get();
        return view('backend.subcategory.manage',compact('subcategories'));
   }
   public function createSubcategory(Request $request){

    $this->validate($request, [
        'name'=>'required',
        'category_id'=>'required'
    ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),

        ]);
                 $categories = Category::all();

        return redirect('/subcategory/manage')->with('success','Subcategory has been created');

   }
   public function DeleteSubcategory($id){
           $subcategory = SubCategory::find($id);
          $subcategory->delete();
          return redirect()->back()->with('success','Subategory has been deleted');


   }
}
