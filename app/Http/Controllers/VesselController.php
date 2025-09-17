<?php

namespace App\Http\Controllers;

use App\Models\Vessel;
use App\Models\VesselInquiry;
use Illuminate\Http\Request;

class VesselController extends Controller
{
    /**
     * Display a listing of vessels with search and filter functionality.
     */
    public function index(Request $request)
    {
        $query = Vessel::available();

        // Apply filters
        if ($request->filled('vessel_type')) {
            $query->where('type', $request->vessel_type);
        }

        if ($request->filled('status')) {
            if ($request->status === 'sale') {
                $query->where('daily_rate', null);
            } elseif ($request->status === 'charter') {
                $query->whereNotNull('daily_rate');
            }
        }

        if ($request->filled('dwt_range')) {
            $dwtRange = $request->dwt_range;
            switch ($dwtRange) {
                case '0-10000':
                    $query->where('capacity', '<=', 10000);
                    break;
                case '10000-50000':
                    $query->where('capacity', '>', 10000)->where('capacity', '<=', 50000);
                    break;
                case '50000-100000':
                    $query->where('capacity', '>', 50000)->where('capacity', '<=', 100000);
                    break;
                case '100000+':
                    $query->where('capacity', '>', 100000);
                    break;
            }
        }

        if ($request->filled('built_year')) {
            $builtYear = $request->built_year;
            switch ($builtYear) {
                case '2020+':
                    $query->where('built_year', '>=', 2020);
                    break;
                case '2015-2019':
                    $query->where('built_year', '>=', 2015)->where('built_year', '<=', 2019);
                    break;
                case '2010-2014':
                    $query->where('built_year', '>=', 2010)->where('built_year', '<=', 2014);
                    break;
                case '2000-2009':
                    $query->where('built_year', '>=', 2000)->where('built_year', '<=', 2009);
                    break;
                case 'pre-2000':
                    $query->where('built_year', '<', 2000);
                    break;
            }
        }

        // Apply search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('type', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('flag', 'like', "%{$search}%");
            });
        }

        // Get vessels with pagination
        $vessels = $query->ordered()->paginate(9);

        // Get featured vessels for the featured section
        $featuredVessels = Vessel::available()
            ->featured()
            ->ordered()
            ->take(6)
            ->get();

        // Get filter options
        $vesselTypes = Vessel::available()
            ->distinct()
            ->pluck('type')
            ->filter()
            ->values();

        $flags = Vessel::available()
            ->distinct()
            ->pluck('flag')
            ->filter()
            ->values();

        // Get statistics
        $stats = [
            'total_vessels' => Vessel::available()->count(),
            'for_sale' => Vessel::available()->whereNull('daily_rate')->count(),
            'for_charter' => Vessel::available()->whereNotNull('daily_rate')->count(),
            'featured' => Vessel::available()->featured()->count(),
        ];

        return view('vessels', compact(
            'vessels', 
            'featuredVessels', 
            'vesselTypes', 
            'flags', 
            'stats'
        ));
    }

    /**
     * Display the specified vessel.
     */
    public function show(Vessel $vessel)
    {
        // Get related vessels
        $relatedVessels = Vessel::available()
            ->where('id', '!=', $vessel->id)
            ->where('type', $vessel->type)
            ->take(3)
            ->get();

        return view('vessels.show', compact('vessel', 'relatedVessels'));
    }

    /**
     * Handle vessel inquiry form submission.
     */
    public function inquiry(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'vessel_id' => 'nullable|exists:vessels,id',
            'inquiry_type' => 'required|string|in:sale,charter,inspection,other',
            'message' => 'required|string|max:1000',
        ]);

        // Here you would typically save the inquiry to a database
        // For now, we'll just redirect with a success message
        return redirect()->back()->with('success', 'Your vessel inquiry has been submitted successfully. We will get back to you soon.');
    }

    /**
     * Show the inquiry form.
     */
    public function showInquiryForm(Request $request)
    {
        $vessels = Vessel::available()->ordered()->get();
        $selectedVesselId = $request->get('vessel_id');
        
        return view('vessels.inquiry', compact('vessels', 'selectedVesselId'));
    }

    /**
     * Show the purchase/sale inquiry form
     */
    public function showPurchaseSaleForm()
    {
        return view('vessels.purchase-sale');
    }

    /**
     * Handle purchase/sale inquiry submission
     */
    public function purchaseSaleInquiry(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'vessel_type' => 'nullable|string|max:100',
            'vessel_dwt' => 'nullable|numeric|min:0',
            'built_year' => 'nullable|integer|min:1950|max:' . (date('Y') + 1),
            'flag' => 'nullable|string|max:100',
            'dimensions' => 'nullable|string|max:500',
            'inquiry_type' => 'required|in:purchase,sale,both',
            'additional_notes' => 'nullable|string|max:2000',
            'vessel_id' => 'nullable|exists:vessels,id',
        ]);

        try {
            // Parse dimensions if provided
            $length = null;
            $width = null;
            $draft = null;
            
            if (!empty($validated['dimensions'])) {
                // Extract dimensions from the dimensions string
                // Format: "Draft: 12m, Length: 200m, Width: 32m"
                preg_match('/Draft:\s*(\d+(?:\.\d+)?)m/i', $validated['dimensions'], $draftMatch);
                preg_match('/Length:\s*(\d+(?:\.\d+)?)m/i', $validated['dimensions'], $lengthMatch);
                preg_match('/Width:\s*(\d+(?:\.\d+)?)m/i', $validated['dimensions'], $widthMatch);
                
                if (isset($draftMatch[1])) $draft = $draftMatch[1];
                if (isset($lengthMatch[1])) $length = $lengthMatch[1];
                if (isset($widthMatch[1])) $width = $widthMatch[1];
            }

            // Prepare data for VesselInquiry
            $inquiryData = [
                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'company_name' => $validated['company_name'],
                'vessel_type' => $validated['vessel_type'] ?? 'Not specified',
                'vessel_dwt' => $validated['vessel_dwt'],
                'built_year_from' => $validated['built_year'],
                'built_year_to' => $validated['built_year'],
                'flag' => $validated['flag'],
                'length' => $length,
                'width' => $width,
                'draft' => $draft,
                'inquiry_type' => $validated['inquiry_type'],
                'additional_notes' => $validated['additional_notes'],
                'vessel_id' => $validated['vessel_id'],
                'status' => 'pending',
            ];

            // Save to vessel_inquiries table
            VesselInquiry::create($inquiryData);
            
            // Send email notification (implement your email logic here)
            // Mail::to('info@globaltradehub.com')->send(new VesselInquiryMail($validated));
            
            return redirect()->back()->with('success', 'Thank you for your inquiry! Our maritime experts will contact you within 24 hours.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, there was an error submitting your inquiry. Please try again or contact us directly.');
        }
    }

    /**
     * Show the dynamic vessel form
     */
    public function showDynamicForm(Request $request)
    {
        // Get unique vessel types from database
        $vesselTypes = Vessel::select('type')
            ->whereNotNull('type')
            ->distinct()
            ->orderBy('type')
            ->pluck('type')
            ->toArray();

        // Get unique flags from database
        $flags = Vessel::select('flag')
            ->whereNotNull('flag')
            ->distinct()
            ->orderBy('flag')
            ->pluck('flag')
            ->toArray();

        // Add common vessel types if not in database
        $commonTypes = ['Bulk Carrier', 'Container Ship', 'Tanker', 'General Cargo', 'Passenger Ship', 'LNG', 'LPG', 'RoRo', 'Cargo Ship'];
        $vesselTypes = array_unique(array_merge($vesselTypes, $commonTypes));
        sort($vesselTypes);

        // Add common flags if not in database
        $commonFlags = ['Panama', 'Liberia', 'Marshall Islands', 'Malta', 'Cyprus', 'Singapore', 'Hong Kong', 'Bahamas', 'Greece', 'Japan'];
        $flags = array_unique(array_merge($flags, $commonFlags));
        sort($flags);

        $selectedVesselId = $request->get('vessel_id');

        return view('vessels.dynamic-form', compact('vesselTypes', 'flags', 'selectedVesselId'));
    }

    /**
     * Handle dynamic vessel form submission
     */
    public function submitDynamicForm(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'vessel_type' => 'required|string|max:100',
            'vessel_dwt' => 'nullable|numeric|min:0',
            'built_year_from' => 'nullable|integer|min:1950|max:' . (date('Y') + 1),
            'built_year_to' => 'nullable|integer|min:1950|max:' . (date('Y') + 1),
            'flag' => 'nullable|string|max:100',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'draft' => 'nullable|numeric|min:0',
            'inquiry_type' => 'required|in:purchase,sale,charter,both',
            'budget_from' => 'nullable|numeric|min:0',
            'budget_to' => 'nullable|numeric|min:0',
            'additional_notes' => 'nullable|string|max:2000',
            'vessel_id' => 'nullable|exists:vessels,id',
        ]);

        try {
            // Add status to validated data
            $validated['status'] = 'pending';
            
            // Save the inquiry to database
            VesselInquiry::create($validated);
            
            // Send email notification (implement your email logic here)
            // Mail::to('info@globaltradehub.com')->send(new DynamicVesselInquiryMail($validated));
            
            return redirect()->back()->with('success', 'Thank you for your detailed vessel inquiry! Our maritime experts will review your requirements and contact you within 24 hours with tailored solutions.');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Sorry, there was an error submitting your inquiry. Please try again or contact us directly.');
        }
    }

    /**
     * Show database render page with all vessels
     */
    public function databaseRender(Request $request)
    {
        $query = Vessel::query();

        // Apply filters
        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('availability')) {
            switch ($request->availability) {
                case 'available':
                    $query->where('is_available', true);
                    break;
                case 'chartered':
                    $query->whereNotNull('daily_rate');
                    break;
                case 'sold':
                    $query->where('daily_rate', null);
                    break;
            }
        }

        if ($request->filled('price_range')) {
            $priceRange = $request->price_range;
            switch ($priceRange) {
                case '0-10000':
                    $query->where('daily_rate', '<=', 10000);
                    break;
                case '10000-25000':
                    $query->where('daily_rate', '>', 10000)->where('daily_rate', '<=', 25000);
                    break;
                case '25000-50000':
                    $query->where('daily_rate', '>', 25000)->where('daily_rate', '<=', 50000);
                    break;
                case '50000+':
                    $query->where('daily_rate', '>', 50000);
                    break;
                case 'sale':
                    $query->whereNull('daily_rate');
                    break;
            }
        }

        if ($request->filled('search')) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('type', 'like', "%{$searchTerm}%")
                  ->orWhere('flag', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        $vessels = $query->orderBy('created_at', 'desc')->paginate(12);

        // Get statistics
        $totalVessels = Vessel::count();
        $availableVessels = Vessel::where('is_available', true)->count();
        $charterVessels = Vessel::whereNotNull('daily_rate')->count();
        $saleVessels = Vessel::whereNull('daily_rate')->count();

        // Get unique vessel types for filter
        $vesselTypes = Vessel::select('type')
            ->whereNotNull('type')
            ->distinct()
            ->orderBy('type')
            ->pluck('type')
            ->toArray();

        return view('vessels.database-render', compact(
            'vessels', 
            'totalVessels', 
            'availableVessels', 
            'charterVessels', 
            'saleVessels',
            'vesselTypes'
        ));
    }

}
