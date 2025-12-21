<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Page;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Page::where('slug', 'categories')->first(); // CMS page data
        $categories = Category::where('status', 1)
            ->latest()
            ->paginate(10);

        return view('front.pages.categories', compact('categories', 'data'));

    }


    // public function create()
    // {
    //     return view('admin.categories.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'en_category_name' => 'required|string|max:255|unique:categories,en_category_name',
    //         'en_short_info'    => 'required|string|max:255',
    //         'icon'             => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
    //         'status'           => 'required|boolean',
    //     ]);

    //     $slug = Str::slug($request->en_category_name);

    //     // ensure unique slug
    //     if (Category::where('slug', $slug)->exists()) {
    //         $slug .= '-' . time();
    //     }

    //     $iconPath = null;
    //     if ($request->hasFile('icon')) {
    //         $iconPath = $request->file('icon')->store('categories', 'public');
    //     }

    //     Category::create([
    //         'en_category_name' => $request->en_category_name,
    //         'en_short_info'    => $request->en_short_info,
    //         'slug'             => $slug,
    //         'icon'             => $iconPath,
    //         'desc'             => $request->desc,
    //         'status'           => $request->status,
    //     ]);

    //     return redirect()
    //         ->route('admin.categories.index')
    //         ->with('success', 'Category created successfully');
    // }

    // public function edit(Category $category)
    // {
    //     return view('admin.categories.edit', compact('category'));
    // }

    // public function update(Request $request, Category $category)
    // {
    //     $request->validate([
    //         'en_category_name' => 'required|string|max:255|unique:categories,en_category_name,' . $category->id,
    //         'en_short_info'    => 'required|string|max:255',
    //         'icon'             => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
    //         'status'           => 'required|boolean',
    //     ]);

    //     $slug = Str::slug($request->en_category_name);
    //     if (
    //         Category::where('slug', $slug)
    //             ->where('id', '!=', $category->id)
    //             ->exists()
    //     ) {
    //         $slug .= '-' . time();
    //     }

    //     if ($request->hasFile('icon')) {
    //         $iconPath = $request->file('icon')->store('categories', 'public');
    //         $category->icon = $iconPath;
    //     }

    //     $category->update([
    //         'en_category_name' => $request->en_category_name,
    //         'en_short_info'    => $request->en_short_info,
    //         'slug'             => $slug,
    //         'desc'             => $request->desc,
    //         'status'           => $request->status,
    //     ]);

    //     return redirect()
    //         ->route('admin.categories.index')
    //         ->with('success', 'Category updated successfully');
    // }

    // public function destroy(Category $category)
    // {
    //     $category->delete();

    //     return redirect()
    //         ->route('admin.categories.index')
    //         ->with('success', 'Category deleted successfully');
    // }
}