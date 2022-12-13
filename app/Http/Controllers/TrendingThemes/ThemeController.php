<?php

namespace App\Http\Controllers\TrendingThemes;

use App\Http\Controllers\Controller;
use App\Models\Theme;

class ThemeController extends Controller
{
    public function index()
    {
        return Theme::get();
    }
}
