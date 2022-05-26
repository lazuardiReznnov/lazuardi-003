<?php

namespace App\Http\Controllers;

use App\Models\Letters;
use Illuminate\Http\Request;

class DashboardLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.letter.index', [
            'letters' => Letters::latest()->paginate(10),
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
     * @param  \App\Models\Letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function show(Letters $letters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function edit(Letters $letters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Letters $letters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Letters  $letters
     * @return \Illuminate\Http\Response
     */
    public function destroy(Letters $letters)
    {
        //
    }
}