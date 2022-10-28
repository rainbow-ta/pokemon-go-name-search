<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
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
            'searchLists' => SearchList::where('user_id', Auth::id())->latest()->get(),
        ]);
    }

    public function store(TagCreateRequest $request)
    {
        SearchList::create([
            'name' => $request->tagName,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('nameSearch.name-search.index');
    }

    public function edit(Request $request, $id)
    {
        return Inertia::render('NameSearch/NameSearchEdit', [
            'filters' => Filter::all(),
            // TODO:テスト後に修正する
            // 'pokemons' => Pokemon::all(),
            'pokemons' => Pokemon::take(50)->get(),
            'searchList' => SearchList::where('id', $id)->get(),
            'searchListFilters' => SearchListFilter::where('search_list_id', $id)->get(),
        ]);
    }
}
