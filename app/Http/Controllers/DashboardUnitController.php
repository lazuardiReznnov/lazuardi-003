<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Brand;
use App\Models\Owner;
use App\Models\Models;
use App\Models\Type;
use App\Models\Grup;
use Illuminate\support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.unit.units.index', [
            'units' => Unit::latest()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.unit.units.create', [
            'brands' => Brand::all(),
            'owners' => Owner::all(),
            'models' => Models::all(),
            'types' => Type::all(),
            'grups' => grup::all(),
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
        $validatedData = $request->validate([
            'noReg' => 'required|max:20',
            'type_id' => 'required',
            'owner_id' => 'required',
            'models_id' => 'required',
            'grup_id' => 'required',
            'noReg' => 'required|unique:units',
            'slug' => 'required|unique:units',
            'vin' => 'required',
            'engineNum' => 'required',
            'year' => 'required',
            'color' => 'required',
            'img' => 'image|file|max:2048',
        ]);

        if ($request->file('img')) {
            $validatedData['img'] = $request->file('img')->store('post-img');
        }

        Unit::create($validatedData);

        return redirect('/dashboard/units')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('dashboard.unit.units.show', [
            'unit' => $unit,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('dashboard.unit.units.edit', [
            'unit' => $unit,
            'brands' => Brand::all(),
            'owners' => Owner::all(),
            'models' => Models::all(),
            'types' => Type::all(),
            'grups' => grup::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        Unit::destroy($unit->id);
        if ($unit->img) {
            storage::delete($unit->img);
        }
        return redirect('/dashboard/units')->with(
            'success',
            'New Post Has Been Deleted.'
        );
    }

    public function getmodels(Request $request)
    {
        $models = Models::where('brand_id', $request->brandID)->get();
        return response()->json($models);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Unit::class, 'slug', $request->noReg);
        return response()->json(['slug' => $slug]);
    }
}