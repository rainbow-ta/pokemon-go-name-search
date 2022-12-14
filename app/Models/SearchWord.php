<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SearchWord extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name',
        'search_word',
        'note',
        'user_id',
    ];
}
