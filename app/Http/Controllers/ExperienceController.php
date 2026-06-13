<?php

namespace App\Http\Controllers;

use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::with('hotel')
            ->where('is_active', true)
            ->get()
            ->groupBy('category');
        
        return view('experiences.index', compact('experiences'));
    }

    public function show(Experience $experience)
    {
        $experience->load('hotel');
        return view('experiences.show', compact('experience'));
    }
}
