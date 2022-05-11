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

    public function edit(PartTenance $partTenance)
    {
        return view('dashboard.maintenance.partTenance.edit', [
            'partTenance' => $partTenance,
            'categories' => CategoriePart::all(),
        ]);
    }

    public function update(Request $request, PartTenance $partTenance)
    {
        $validatedData = $request->validate([
            'maintenance_id' => 'required',
            'sparepart_id' => 'required',
            'qty' => 'required',
        ]);

        // jika qty diganti
        if ($partTenance->qty != $request->qty) {
            $sparepart_update =
                $partTenance->sparepart->qty +
                $partTenance->qty -
                $validatedData['qty'];
            sparepart::where('id', $partTenance->sparepart_id)->update([
                'qty' => $sparepart_update,
            ]);
        }
        //jika Sparepart Diganti
        if ($partTenance->sparepart_id != $request->sparepart_id) {
            $part_update1 = $partTenance->sparepart->qty + $partTenance->qty;
            sparepart::where('id', $partTenance->sparepart_id)->update([
                'qty' => $part_update1,
            ]);
           
            $part_update2 = $partTenance->sparepart->qty - $validatedData['qty'];
            sparepart::where('id', $request->sparepart_id)->update(['qty' => $part_update2]);
        }

        PartTenance::where('id', $partTenance->id)->update($validatedData);
        return redirect(
            '/dashboard/maintenances/' . request('maintenance_id')
        )->with('success', 'New Sparepart Data Has Been aded.!');
    }

    public function destroy(PartTenance $partTenance){

        PartTenance::destroy($partTenance->id);
        
        $partUpdate = $partTenance->sparepart->qty+$partTenance->qty;
        sparepart::where('id',$partTenance->sparepart_id)->update(['qty'=>$partUpdate]);

        return redirect(
            '/dashboard/maintenances/' . $partTenance->maintenance_id
        )->with('success', ' Data Has Been Deleted.!');
    }
}
