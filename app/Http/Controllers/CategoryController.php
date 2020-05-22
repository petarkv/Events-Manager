<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Event;

class CategoryController extends Controller
{
    public function getAddCategory(){
        return \view('admin.categories.add_category');
    }

    public function postAddCategory(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
        }

            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }

            $category = new Category;
            $category->name = $data['category_name'];
            $category->description = $data['description'];
            $category->url = $data['url'];
            $category->status = $status;
            $category->save();

            return \redirect('/admin/view-categories')->with('flash_message_success', 'Category added Successfully!');                
    }
    
    public function getViewCategories(){
        $categories = Category::get();
        return \view('admin.categories.view_categories')->with(\compact('categories'));
    }

    public function getEditCategory($id=null){
        $categoryDetails = Category::where(['category_id'=>$id])->first();
        return \view('admin.categories.edit_category')->with(\compact('categoryDetails'));
    }

    public function postEditCategory(Request $request, $id=null){
        if ($request->isMethod('post')) {
            $data = $request->all();

            if (empty($data['status'])) {
                $status = 0;
            }else{
                $status = 1;
            }

            Category::where(['category_id'=>$id])->update(['name'=>$data['category_name'],
                                                            'description'=>$data['description'],
                                                            'url'=>$data['url'],
                                                            'status'=>$status]);
            return \redirect('admin/view-categories')->with('flash_message_success','Category updated Successfully!');
        }
    }

    public function deleteCategory($id=null){
        $event = Event::where(['category_id'=>$id])->get();
        if (count($event)>0) {
            return \redirect()->back()->with('flash_message_error','Sorry, You could not delete. There are Events in this Category.');
        }else{
        if (!empty($id)) {
            Category::where(['category_id'=>$id])->delete();
            return \redirect()->back()->with('flash_message_success','Category deleted Successfully!');
        }
        }
    }
}
