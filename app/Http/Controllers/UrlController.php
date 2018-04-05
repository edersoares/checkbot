<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function index()
    {
        return view('url.index', [
            'urls' => Url::all()
        ]);
    }

    public function create()
    {
        return view('url.create');
    }

    public function save(Request $request)
    {
        $request->merge([
            'available_at' => now(),
            'status' => Url::STATUS_OPENED,
            'port' => 80,
        ]);

        Url::create($request->all());

        return redirect()->route('url.index');
    }
}
