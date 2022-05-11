<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\PartTenance;
use App\Models\Unit;
use Illuminate\Http\Request;

class DashboardMaintenance extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.maintenance.index', [
            'tenances' => Maintenance::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.maintenance.create',[
            'units'=> Unit::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'date' => 'required',
            'unit_id'=> 'required',
            'problem' => 'required',
            'analysis'=>'required|max:255',
            'mechanic'=>'required'
        ]);

        Maintenance::create($validateData);

        return redirect('/dashboard/maintenances')->with(
            'success',
            'New Data Has Been aded.!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.show', [
            'maintenance' => $maintenance,
            'parts' => PartTenance::where('maintenance_id', $maintenance->id)
                ->latest()
                ->paginate(10),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenance $maintenance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }

    public function print(Maintenance $maintenance)
    {
        return view('dashboard.maintenance.print', [
            'maintenance' => $maintenance,
        ]);
    }

    public function editstatus(Maintenance $maintenance)
    {
        $states = [
            [
                'status' => 0,
                'desc' => 'mulai Perbaikan',
            ],
            [
                'status' => 25,
                'desc' => 'Analisis',
            ],
            [
                'status' => 50,
                'desc' => 'Part Wait',
            ],
            [
                'status' => 75,
                'desc' => 'Fhinishing',
            ],
            [
                'status' => 100,
                'desc' => 'End',
            ],
        ];
        return view('dashboard.maintenance.editstatus', [
            'maintenance' => $maintenance,
            'states' => $states,
        ]);
    }

    public function statusupdate(Request $request, Maintenance $maintenance)
    {
        $validateData = $request->validate([
            'status' => 'required',
        ]);
        Maintenance::Where('id', $maintenance->id)->update($validateData);

        return redirect('/dashboard/maintenances/' . $maintenance->id)->with(
            'success',
            'Status Has Been Updated.!'
        );
    }
}
