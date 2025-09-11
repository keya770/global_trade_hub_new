<?php

namespace App\Http\Controllers;

use App\Models\VesselInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class VesselInquiryController extends Controller
{
    /**
     * Store Sale & Purchase inquiry
     */
    public function storeSalePurchase(Request $request)
    {
        // Debug: Log the request data
        Log::info('Sale Purchase Form Submission', $request->all());
        
        $validator = Validator::make($request->all(), [
            'organisation_type' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:1000',
            'ship_type' => 'required|string|max:255',
            'vessel_type' => 'required|string|max:255',
            'year_of_build' => 'nullable|integer|min:1900|max:2030',
            'dwt' => 'nullable|numeric|min:0',
            'build_nation' => 'nullable|string|max:255',
            'budget' => 'nullable|numeric|min:0',
            'trading_area' => 'nullable|string|max:255',
            'delivery_location' => 'nullable|string|max:255',
            'timeline' => 'nullable|date',
            'action' => 'required|string|in:buy,sale',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $inquiryData = [
                'full_name' => $request->company_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_name' => $request->company_name,
                'organisation_type' => $request->organisation_type,
                'address' => $request->address,
                'vessel_type' => $request->vessel_type,
                'year_of_build' => $request->year_of_build,
                'dwt' => $request->dwt,
                'inquiry_type' => 'sale_purchase',
                'status' => 'pending',
                // Sale & Purchase specific fields
                'ship_type' => $request->ship_type,
                'build_nation' => $request->build_nation,
                'budget' => $request->budget,
                'trading_area' => $request->trading_area,
                'delivery_location' => $request->delivery_location,
                'timeline' => $request->timeline,
                'action' => $request->action,
                'additional_notes' => $this->generateSalePurchaseNotes($request),
            ];

            VesselInquiry::create($inquiryData);

            return redirect()->back()->with('success', 'Thank you for your vessel sale & purchase inquiry! Our maritime experts will contact you within 24 hours with suitable vessel options.');

        } catch (\Exception $e) {
            Log::error('Sale Purchase Form Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->back()->with('error', 'Sorry, there was an error submitting your sale & purchase inquiry. Please try again or contact us directly.');
        }
    }

    /**
     * Store Chartering inquiry
     */
    public function storeChartering(Request $request)
    {
        // Debug: Log the request data
        Log::info('Chartering Form Submission', $request->all());
        
        $validator = Validator::make($request->all(), [
            'organisation_type' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:1000',
            'charter_type' => 'required|string|max:255',
            'vessel_type' => 'required|string|max:255',
            'laycan_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'start_date' => 'nullable|date',
            'budget_per_ton' => 'nullable|numeric|min:0',
            'budget_per_day' => 'nullable|numeric|min:0',
            'port_of_loading' => 'nullable|string|max:255',
            'port_of_discharge' => 'nullable|string|max:255',
            'cargo_type' => 'nullable|string|max:255',
            'cargo_quantity' => 'nullable|numeric|min:0',
            'load_rate' => 'nullable|numeric|min:0',
            'discharge_rate' => 'nullable|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $inquiryData = [
                'full_name' => $request->company_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'company_name' => $request->company_name,
                'organisation_type' => $request->organisation_type,
                'address' => $request->address,
                'vessel_type' => $request->vessel_type,
                'inquiry_type' => 'chartering',
                'status' => 'pending',
                // Chartering specific fields
                'charter_type' => $request->charter_type,
                'laycan_date' => $request->laycan_date,
                'delivery_date' => $request->delivery_date,
                'start_date' => $request->start_date,
                'budget_per_ton' => $request->budget_per_ton,
                'budget_per_day' => $request->budget_per_day,
                // Freight fields
                'port_of_loading' => $request->port_of_loading,
                'port_of_discharge' => $request->port_of_discharge,
                'cargo_type' => $request->cargo_type,
                'cargo_quantity' => $request->cargo_quantity,
                'load_rate' => $request->load_rate,
                'discharge_rate' => $request->discharge_rate,
                'additional_notes' => $this->generateCharteringNotes($request),
            ];

            VesselInquiry::create($inquiryData);

            return redirect()->back()->with('success', 'Thank you for your chartering inquiry! Our maritime experts will contact you within 24 hours with chartering options.');

        } catch (\Exception $e) {
            Log::error('Chartering Form Error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->all()
            ]);
            return redirect()->back()->with('error', 'Sorry, there was an error submitting your chartering inquiry. Please try again or contact us directly.');
        }
    }

    /**
     * Generate additional notes for Sale & Purchase inquiry
     */
    private function generateSalePurchaseNotes(Request $request): string
    {
        $notes = [];
        
        $notes[] = "=== SALE & PURCHASE INQUIRY ===";
        $notes[] = "Organisation Type: " . $request->organisation_type;
        $notes[] = "Address: " . $request->address;
        $notes[] = "Ship Type: " . $request->ship_type;
        
        if ($request->build_nation) {
            $notes[] = "Build Nation: " . $request->build_nation;
        }
        
        if ($request->budget) {
            $notes[] = "Budget: $" . number_format($request->budget) . " USD";
        }
        
        if ($request->trading_area) {
            $notes[] = "Trading Area: " . $request->trading_area;
        }
        
        if ($request->delivery_location) {
            $notes[] = "Delivery Location: " . $request->delivery_location;
        }
        
        if ($request->timeline) {
            $notes[] = "Timeline: " . $request->timeline;
        }
        
        return implode("\n", $notes);
    }

    /**
     * Generate additional notes for Chartering inquiry
     */
    private function generateCharteringNotes(Request $request): string
    {
        $notes = [];
        
        $notes[] = "=== CHARTERING INQUIRY ===";
        $notes[] = "Organisation Type: " . $request->organisation_type;
        $notes[] = "Address: " . $request->address;
        $notes[] = "Charter Type: " . $request->charter_type;
        
        if ($request->laycan_date) {
            $notes[] = "Laycan Date: " . $request->laycan_date;
        }
        
        if ($request->delivery_date) {
            $notes[] = "Delivery Date: " . $request->delivery_date;
        }
        
        if ($request->start_date) {
            $notes[] = "Start Date: " . $request->start_date;
        }
        
        if ($request->budget_per_ton) {
            $notes[] = "Budget per Ton: $" . $request->budget_per_ton;
        }
        
        if ($request->budget_per_day) {
            $notes[] = "Budget per Day: $" . $request->budget_per_day;
        }
        
        if ($request->port_of_loading) {
            $notes[] = "Port of Loading: " . $request->port_of_loading;
        }
        
        if ($request->port_of_discharge) {
            $notes[] = "Port of Discharge: " . $request->port_of_discharge;
        }
        
        if ($request->cargo_type) {
            $notes[] = "Cargo Type: " . $request->cargo_type;
        }
        
        if ($request->cargo_quantity) {
            $notes[] = "Cargo Quantity: " . $request->cargo_quantity . " MT";
        }
        
        if ($request->load_rate) {
            $notes[] = "Load Rate: " . $request->load_rate;
        }
        
        if ($request->discharge_rate) {
            $notes[] = "Discharge Rate: " . $request->discharge_rate;
        }
        
        return implode("\n", $notes);
    }
}