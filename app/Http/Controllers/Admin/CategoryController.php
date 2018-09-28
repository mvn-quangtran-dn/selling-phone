<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;
use App\Http\Requests\CategoryValidate;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.categories.index', compact('categories'));
    }
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.categories.create', compact('categories'));
    }
    public function store(CategoryValidate $request)
    {
        $data = [
          'name' => $request->name,
          'parent_id' => $request->parent_id
        ];
        Category::create($data);
        return redirect()->route('categories.index');
    }
    public function edit(Category $category)
    {
        //dd($category);
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admin.categories.edit', compact('categories', 'category'));
    }
    public function update(Category $category, CategoryValidate $request)
    {
        $data = $request->all();
        $category->update($data);
        return redirect()->route('categories.index');
    }
    public function destroy(Category $category, Request $request)
    {
      $category->delete($data);
      return redirect()->route('categories.index');
    }
}
