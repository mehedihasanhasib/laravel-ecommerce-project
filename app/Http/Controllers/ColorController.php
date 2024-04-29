<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::orderBy('created_at', 'desc')->get();
        return view('admin.create_color', ['colors' => $colors]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'color' => 'required|max:255'
        ]);

        Color::UpdateOrCreate($data);

        return back();
    }
}
