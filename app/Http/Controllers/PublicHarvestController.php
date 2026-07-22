<?php
namespace App\Http\Controllers;

use App\Models\Harvest;

class PublicHarvestController extends Controller
{
    public function show($public_code)
    {
        $harvest = Harvest::where('public_code', $public_code)->firstOrFail();
        return view('public.harvest', compact('harvest'));
    }
}