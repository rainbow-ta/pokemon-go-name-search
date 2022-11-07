<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
use App\Models\Filter;
use App\Models\Pokemon;
use App\Models\SearchWord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class NameSearchController extends Controller
{
    public function index()
    {
        return Inertia::render('NameSearch/NameSearchIndex', [
            'searchWords' => SearchWord::where('user_id', Auth::id())->latest()->get(),
        ]);
    }

    public function store(TagCreateRequest $request)
    {
        SearchWord::create([
            'tag_name' => $request->tagName,
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
            'searchWords' => SearchWord::where('id', $id)->get(),
        ]);
    }

    public function update(TagCreateRequest $request)
    {
        SearchWord::where('id', $request->id)->update([
            'tag_name' => $request->tagName,
            'search_word' => $request->searchWord,
        ]);

        return redirect()->route('nameSearch.name-search.edit', $request->id);
    }

    public function destroy(Request $request)
    {
        SearchWord::destroy($request->id);

        return redirect()->route('nameSearch.name-search.index');
    }
}
