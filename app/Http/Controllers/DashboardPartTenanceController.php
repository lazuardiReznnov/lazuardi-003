<?php

namespace App\Http\Controllers;

use App\Models\CategoriePart;
use App\Models\Maintenance;
use App\Models\PartTenance;
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

    public function store(Request $request)
    {
        if (isset($request->maintenance_id)) {
            $validatedData = $request->validate([
                'maintenance_id' => 'required',
                'sparepart_id' => 'required',
                'qty' => 'required',
            ]);

            $sparepart = sparepart::where(
                'id',
                $validatedData['sparepart_id']
            )->first();
            $update_part = $sparepart->qty - $validatedData['qty'];

            PartTenance::create($validatedData);

            $sparepart->update(['qty' => $update_part]);

            return redirect(
                '/dashboard/maintenances/' . request('maintenance_id')
            )->with('success', 'New Sparepart Data Has Been aded.!');
        }
    }
}
