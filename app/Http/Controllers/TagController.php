<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function toggleTag() 
    {
        $isActivated = Tag::where('is_active', true)
        ->with('tags')
        ->latest()
        ->get();
    }
}
