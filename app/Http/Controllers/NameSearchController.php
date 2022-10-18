<?php

namespace App\Http\Controllers;

use App\Models\SearchWord;
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
}
