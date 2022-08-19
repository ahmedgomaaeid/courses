<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Catogry\MainCategory;
use App\Models\Catogry\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::all();
        return view('admin.category.sub-category.index', compact('subCategories'));
    }
    public function create()
    {
        $mainCategories = MainCategory::all();
        return view('admin.category.sub-category.create', compact('mainCategories'));
    }
    public function store(SubCategoryRequest $request)
    {
        $subCategory = new SubCategory();
        $subCategory->name = $request->name;
        $subCategory->main_category_id = $request->main_category_id;
        $subCategory->save();
        return redirect()->route('get.admin.sub-category')->with('success', 'تم اضافة القسم بنجاح');
    }
    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $mainCategories = MainCategory::all();
        return view('admin.category.sub-category.edit', compact('subCategory', 'mainCategories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:sub_categories|max:255',
            'main_category_id' => 'required',
        ]);
        $subCategory = SubCategory::find($id);
        $subCategory->name = $request->name;
        $subCategory->main_category_id = $request->main_category_id;
        $subCategory->save();
        return redirect()->route('get.admin.sub-category')->with('success', 'تم تعديل القسم بنجاح');
    }
    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->delete();
        return redirect()->route('get.admin.sub-category')->with('success', 'تم حذف القسم بنجاح');
    }
}
