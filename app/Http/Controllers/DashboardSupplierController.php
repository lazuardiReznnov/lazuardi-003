<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SupplierImport;

class DashboardSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.supplier.index', [
            'suppliers' => Supplier::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.supplier.create');
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
            'name' => 'required|max:50',
            'telp' => 'required',
            'email' => 'required|email:dns',
            'address' => 'required',
        ]);

        Supplier::create($validatedData);

        return redirect('/dashboard/suppliers')->with(
            'success',
            'New Owner Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('dashboard.supplier.edit', [
            'supplier' => $supplier,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $rules = [
            'address' => 'required',
            'email' => 'required|email:dns',
            'telp' => 'required',
        ];

        if ($request->name != $supplier->name) {
            $rules['name'] = 'required';
        }
        if ($request->slug != $supplier->slug) {
            $rules['slug'] = 'required|unique:suppliers';
        }

        $validatedData = $request->validate($rules);

        Supplier::Where('id', $supplier->id)->update($validatedData);
        return redirect('/dashboard/suppliers')->with(
            'success',
            'Owner Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        Supplier::destroy($supplier->id);

        return redirect('/dashboard/suppliers')->with(
            'success',
            'Owner Has Been Deleted.'
        );
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(
            Supplier::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }

    public function fileImportCreate()
    {
        return view('dashboard.supplier.file-import-create');
    }

    public function fileImport(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new SupplierImport(), $validatedData['excl']);
            return redirect('/dashboard/suppliers')->with(
                'success',
                'New Owners Has Been Aded.!'
            );
        }
    }
}
