<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Number of records per page
        $perPage = $request->input('perPage', 5);

        // Get the pagination and sorting list of categories
        $categories = Category::latest()->paginate($perPage);

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::createCategory($data);

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing a category.
     *
     * @param  int  $categoryId
     * @return \Illuminate\View\View
     */
    public function edit($categoryId)
    {
        $category = Category::getCategoryById($categoryId);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the category.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::updateCategory($category->category_id, $data);

        return redirect()->route('categories.index');
    }

    /**
     * Remove the category.
     *
     * @param  int  $categoryId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category) {
            // Handle the case where the category is not found
            abort(404);
        }

        $category->delete();

        return redirect()->route('categories.index');
    }
}
