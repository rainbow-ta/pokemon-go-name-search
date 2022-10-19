<?php

namespace App\Http\Controllers;

use App\Models\SearchWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NameSearchController extends Controller
{
    public function index()
    {
        return Inertia::render('NameSearch/NameSearchIndex', [
            'searchWords' => SearchWord::where('user_id', Auth::id())->get(),
        ]);
    }

    public function edit(Request $request)
    {
        return Inertia::render('NameSearch/NameSearchEdit', [

        ]);
    }
}
