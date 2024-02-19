<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    protected $table = 'new-news'; 

    protected $fillable = [
        'title',
        'text',
        'file_path',
    ];
}

