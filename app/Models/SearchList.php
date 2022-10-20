<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchList extends Model
{
    use HasFactory;

    public function searchListFilters()
    {
        return $this->hasMany(SearchListFilter::class);
    }
}
