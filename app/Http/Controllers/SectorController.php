<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of sectors.
     */
    public function index()
    {
        // Get all active sectors
        $sectors = Sector::active()
            ->latest()
            ->get();

        // Get featured sectors (first 3 for the grid)
        $featuredSectors = $sectors;

        // Get detailed sector (first one for the detailed section)
        $detailedSector = $sectors->first();

        // Get statistics
        $stats = [
            'total_sectors' => $sectors->count(),
            'active_sectors' => $sectors->where('status', true)->count(),
        ];

        return view('sectors', compact('sectors', 'featuredSectors', 'detailedSector', 'stats'));
    }

    /**
     * Display the specified sector.
     */
    public function show(Sector $sector)
    {
        // Get related sectors
        $relatedSectors = Sector::active()
            ->where('id', '!=', $sector->id)
            ->take(3)
            ->get();

        return view('sectors.show', compact('sector', 'relatedSectors'));
    }
}
