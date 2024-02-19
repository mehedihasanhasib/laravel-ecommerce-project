<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('admin.create_color');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'color' => 'required|max:255'
        ]);

        Color::updateOrInsert($data);

        return redirect()->route('addproduct');

        // dump($request->input());
    }
}
