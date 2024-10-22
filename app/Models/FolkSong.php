<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolkSong extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'song', 'region', 'image_url'];
}
