<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class ResidentPaymentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $withZeroMinutes = filter_var($request->query('with_zero_minutes'), FILTER_VALIDATE_BOOLEAN);
        $filename = $request->query('filename', 'resident-payment-table');

        $vehicles = Vehicle::with('vehicleType')->when((!$withZeroMinutes), function ($query) {
            return $query->where('accumulated_minutes', '>', 0);
        })->get();

        $pdf = PDF::loadView('PDF.resident-payment-table', [
            'vehicles' => $vehicles,
        ]);

        return $pdf->download($filename . '.pdf');
    }
}
