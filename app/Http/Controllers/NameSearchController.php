<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class NameSearchController extends Controller
{
    public function index()
    {
        return Inertia::render('NameSearch/NameSearchIndex', [
        ]);
    }
}
