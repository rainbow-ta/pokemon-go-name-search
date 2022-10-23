<?php

namespace App\Http\Controllers;

use App\Models\Filter;
use App\Models\Pokemon;
use App\Models\SearchList;
use App\Models\SearchListFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NameSearchController extends Controller
{
    public function index()
    {
        return Inertia::render('NameSearch/NameSearchIndex', [
            'searchLists' => SearchList::where('user_id', Auth::id())->get(),
        ]);
    }

    public function edit(Request $request, $id)
    {
        return Inertia::render('NameSearch/NameSearchEdit', [
            'filters' => Filter::all(),
            // TODO:テスト後に修正する
            // 'pokemons' => Pokemon::all(),
            'pokemons' => Pokemon::take(50)->get(),
            'searchListFilters' => SearchListFilter::where('search_list_id', $id)->with('searchList', 'filter')->get(),
        ]);
    }
}
