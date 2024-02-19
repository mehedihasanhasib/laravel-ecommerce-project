<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        return view('admin.create_size');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'size' => 'required|max:255'
        ]);

        Size::updateOrInsert($data);

        return redirect()->route('addproduct');
    }
}
