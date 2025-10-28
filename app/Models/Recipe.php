<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\RecipeController;

class Recipe extends Model
{
    protected $fillable = ['title', 'image_path', 'description', 'type'];
}
