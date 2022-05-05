<?php

namespace App\Http\Controllers;

use App\Models\CategoriePart;
use App\Models\Maintenance;
use App\Models\sparepart;
use Illuminate\Http\Request;

class DashboardPartTenanceController extends Controller
{
    public function create(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.partTenance.create', [
            'maintenance' => $maintenance,
            'categories' => CategoriePart::all(),
        ]);
    }
}