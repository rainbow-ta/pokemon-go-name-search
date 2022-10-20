<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchListFilter extends Model
{
    use HasFactory;

    public function searchList()
    {
        return $this->belongsTo(SearchList::class);
    }

    public function filter()
    {
        return $this->belongsTo(Filter::class);
    }
}
