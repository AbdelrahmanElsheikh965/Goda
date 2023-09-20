<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('Admin.Categories.index', ['categories' => Category::paginate(6)]);
    }

    public function create()
    {
        return view('Admin.Categories.createForm');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $category = Category::create($request->all());
        ($category) ? session()->put('message', "Done") : session()->put('message', "Error");
        return redirect('user/categories/create');
    }

    public function edit(Category $category)
    {
        return view('Admin.Categories.updateForm', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);
        $category->update(['name' => $request->name]);
        ($category) ? session()->put('message', "Updated") : session()->put('message', "Error");
        return redirect('user/categories');
    }

    public function delete(Category $category)
    {
        $category->delete();
        ($category) ? session()->put('message', "Deleted Successfully") : session()->put('message', "Error");
        return redirect('user/categories');
    }
}
