<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.create_category');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|max:255'
        ]);

        Category::updateOrInsert($data);

        return redirect()->route('addproduct');
    }
}
