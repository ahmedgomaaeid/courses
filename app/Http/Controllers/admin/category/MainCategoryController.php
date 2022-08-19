<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Catogry\MainCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function index()
    {
        $mainCategories = MainCategory::all();
        return view('admin.category.main-category.index', compact('mainCategories'));
    }
    public function create()
    {
        return view('admin.category.main-category.create');
    }
    public function store(MainCategoryRequest $request)
    {
        $mainCategory = new MainCategory();
        $mainCategory->name = $request->name;
        $mainCategory->save();
        return redirect()->route('get.admin.main-category')->with('success', 'تم اضافة القسم بنجاح');
    }
    public function edit($id)
    {
        $mainCategory = MainCategory::find($id);
        return view('admin.category.main-category.edit', compact('mainCategory'));
    }
    public function update(MainCategoryRequest $request, $id)
    {
        $mainCategory = MainCategory::find($id);
        $mainCategory->name = $request->name;
        $mainCategory->save();
        return redirect()->route('get.admin.main-category')->with('success', 'تم تعديل القسم بنجاح');
    }
    public function destroy($id)
    {
        $mainCategory = MainCategory::find($id);
        $mainCategory->delete();
        return redirect()->route('get.admin.main-category')->with('success', 'تم حذف القسم بنجاح');
    }

}
