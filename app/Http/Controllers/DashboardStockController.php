<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\CategoriePart;
use App\Models\Models;
use App\Models\sparepart;
use App\Models\Stock;
use Illuminate\Http\Request;

class DashboardStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->stock = Stock::latest();
        $this->sparepart = sparepart::all();
        $this->models = Models::All();
        $this->brand = Brand::All();
        $this->categories = CategoriePart::all();
    }
    public function index()
    {
        return view('dashboard.stok.index', [
            'stocks' => $this->stock->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.stok.create', [
            'brands' => $this->brand,
            'models' => $this->models,
            'spareparts' => $this->sparepart,
            'categories' => $this->categories,
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
            'type' => 'required',
            'sparepart_id' => 'required',
            'date' => 'required',
            'inv' => 'required',
            'store_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        $sparepart = sparepart::where('id', $request->sparepart_id);
        $sparepart_qty = $sparepart->first();
        $part_update = $validatedData['qty'] + $sparepart_qty->qty;

        Stock::create($validatedData);

        $sparepart->update(['qty' => $part_update]);

        return redirect('/dashboard/stocks')->with(
            'success',
            'Unit Has Been Added.!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $sparepart = sparepart::where('id', $stock->sparepart_id);
        $sparepart_qty = $sparepart->first();
        $part_update = $sparepart_qty->qty - $stock->qty;

        $sparepart->update(['qty' => $part_update]);
        Stock::destroy($stock->id);

        return redirect('/dashboard/stocks')->with(
            'success',
            'Unit Has Been Deleted.!'
        );
    }

    public function getsparepart(Request $request)
    {
        $sparepart = sparepart::where(
            'categorie_id',
            $request->categoripart
        )->get();
        return response()->json($sparepart);
    }
}
