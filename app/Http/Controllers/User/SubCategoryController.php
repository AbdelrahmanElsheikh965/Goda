<?php

namespace App\Http\Controllers\User;

use App\ECommerce\Shared\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return view('Admin.SubCategories.index', ['subCategories' => SubCategory::paginate(6)]);
    }

    public function create()
    {
        return view('Admin.SubCategories.createForm');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'sub_category_image' => 'image|mimes:jpg,png,jpeg',
            'category_id' => 'required'
            ],
            [
                'category_id' => 'The category field is required'
            ]);

        if ($request->file('sub_category_image')) {
            $request->merge(['image' => $request->sub_category_image->getClientOriginalName()]);
            $subCategory = SubCategory::create($request->except('_token', 'sub_category_image'));
            Helper::save($request->file('sub_category_image'), '/admin/subCategories');
        }else{
            $subCategory = SubCategory::create($request->all());
        }

        ($subCategory) ? session()->put('message', "Done") : session()->put('message', "Error");
        return redirect('user/sub-categories');
    }

    public function edit(SubCategory $subCategory)
    {
        return view('Admin.SubCategories.updateForm', compact('subCategory'));
    }

    public function update(Request $request, SubCategory $subCategory)
    {
        $request->validate(['name' => 'required']);

        if ($request->file('sub_category_image')) {
            $request->merge(['image' => $request->sub_category_image->getClientOriginalName()]);
            $subCategory = $subCategory->update($request->except('sub_category_image'));
            Helper::save($request->file('sub_category_image'), '/admin/subCategories');
        }else{
            $subCategory = $subCategory->update($request->except('sub_category_image'));
        }
        ($subCategory) ? session()->put('message', "Updated") : session()->put('message', "Error");
        return redirect('user/sub-categories');
    }

    public function delete(SubCategory $subCategory)
    {
        $subCategory->delete();
        ($subCategory) ? session()->put('message', "Deleted Successfully") : session()->put('message', "Error");
        return redirect('user/sub-categories');
    }
}
