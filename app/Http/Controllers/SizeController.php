<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        $sizes = Size::orderBy('created_at', 'desc')->get();
        return view('admin.create_size', ['sizes' => $sizes]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'size' => 'required|max:255'
        ]);

        try {
            Size::UpdateOrCreate($data);

            return back();
        } catch (\Throwable $th) {
            dump($th->getMessage());
        }
    }

    public function destroy(string $sizeId)
    {
        echo $sizeId;
    }
}
