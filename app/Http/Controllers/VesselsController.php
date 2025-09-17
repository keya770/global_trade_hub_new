<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use Illuminate\Http\Request;

class VesselsController extends Controller
{
    public function index()
    {
        $vessels = Vessel::available()->ordered()->paginate(12);
        return view('vessels', compact('vessels'));
    }

    public function show($id)
    {
        $vessel = Vessel::available()->findOrFail($id);
        
        $relatedVessels = Vessel::available()
            ->where('id', '!=', $vessel->id)
            ->where('type', $vessel->type)
            ->ordered()
            ->limit(4)
            ->get();

        return view('vessel_details', compact('vessel', 'relatedVessels'));
    }
}
