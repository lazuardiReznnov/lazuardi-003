<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
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

    public function index()
    {
        return view('dashboard.stok.index', [
            'stocks' => stock::latest()->paginate(10)->withQueryString(),
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
            'categories' => CategoriePart::all(),
            'suppliers' => Supplier::all()
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
            'supplier_id' => 'required',
            'date' => 'required',
            'inv' => 'required',
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('dashboard.stok.edit', [
            'stock' => $stock,
            'categories' => CategoriePart::all(),
            'suppliers' => Supplier::all()
        ]);
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
        $validatedData = $request->validate([
            'type' => 'required',
            'sparepart_id' => 'required',
            'supplier_id' => 'required',
            'date' => 'required',
            'inv' => 'required',
            'qty' => 'required',
            'price' => 'required',
        ]);

        // jika qty stock diganti
        if ($stock->qty != $request->qty) {
            $part_update =
                $validatedData['qty'] + $stock->sparepart->qty - $stock->qty;
            sparepart::where('id', $stock->sparepart_id)->update([
                'qty' => $part_update,
            ]);
        }
        // jika nama sparepartnya diganti
        if ($stock->sparepart_id != $request->sparepart_id) {
            $part_update1 = $stock->sparepart->qty - $stock->qty;
            sparepart::where('id', $stock->sparepart_id)->update([
                'qty' => $part_update1,
            ]);

            $sparepart = sparepart::where('id', $request->sparepart_id);
            $sparepart_qty = $sparepart->first();
            $part_update2 = $validatedData['qty'] + $sparepart_qty->qty;
            $sparepart->update(['qty' => $part_update2]);
        }

        $validatedData['price'] = str_replace(',', '', $validatedData['price']);

        Stock::where('id', $stock->id)->update($validatedData);

        return redirect('/dashboard/stocks')->with(
            'success',
            'Unit Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        // $sparepart = sparepart::where('id', $stock->sparepart_id);
        // $sparepart_qty = $sparepart->first();
        $part_update = $stock->sparepart->qty - $stock->qty;

        sparepart::where('id', $stock->sparepart_id)->update([
            'qty' => $part_update,
        ]);
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
