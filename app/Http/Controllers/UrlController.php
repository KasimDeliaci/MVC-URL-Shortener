<?php

// app/Http/Controllers/UrlController.php
namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UrlController extends Controller {
    public function index() {
        return view('welcome');
    }

    public function store(Request $request) {
        $request->validate([
            'url' => 'required|url'
        ]);

        $original_url = $request->input('url');
        $existing_url = Url::where('original_url', $original_url)->first();

        if ($existing_url) {
            return redirect()->back()->with('short_url', $existing_url->short_url);
        }

        $short_url = Str::random(12);
        Url::create([
            'original_url' => $original_url,
            'short_url' => $short_url
        ]);

        return redirect()->back()->with('short_url', $short_url);
    }

    public function show($short_url) {
        $url = Url::where('short_url', $short_url)->firstOrFail();
        return redirect($url->original_url);
    }
}
