<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortBy('sort');

        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.categoriesCreate', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create($request->except('_token'));

        return redirect()->route('category.index');
    }

    public function destroy(Category $category)
    {
        foreach ($category->children as $child) {

            if($category->parent) {
                $child->parent_id = $category->parent_id;
            }
            else {
                $child->parent_id = 0;
            }
            $child->save();
        }
        try {
            $category->delete();
        } catch (\Exception $e) {
        }

        return redirect()->route('category.index');
    }

    public function sort()
    {
        return view('admin.common.sort');
    }

    public function sortAjax(Request $request)
    {
        if ($request->isMethod('post') && $request->get('sortable'))
        {
            Category::saveOrder($request->get('sortable'));
        }

        $categories = Category::getNested();

        return view('admin.common.sortAjax', ['items'=> $categories]);
    }

}
