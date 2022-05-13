<?php

namespace App\Http\Controllers;

use App\Models\CategoriePart;
use Illuminate\Http\Request;

class DashboardCategoriePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sparepart.category.index',[
            'categories'=>CategoriePart::latest()->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriePart  $categoriePart
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriePart $categoriePart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriePart  $categoriePart
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriePart $categoriePart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoriePart  $categoriePart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriePart $categoriePart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriePart  $categoriePart
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriePart $categoriePart)
    {
        //
    }
}
