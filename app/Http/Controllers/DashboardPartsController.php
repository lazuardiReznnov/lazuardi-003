<?php

namespace App\Http\Controllers;

use App\Models\CategoriePart;
use App\Models\sparepart;
use App\Models\Brand;
use App\Models\Models;
use App\Imports\sparepartImport;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Maatwebsite\Excel\Facades\Excel;

class DashboardPartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $part = sparepart::latest();
        $title = '';

        if (request('categori')) {
            $part->where('categorie_id', request('categori'));
            $category = CategoriePart::firstWhere('id', request('categori'));
            $title = $category->name;
        }
        return view('dashboard.sparepart.index', [
            'categories' => CategoriePart::all(),
            'parts' => $part->paginate(10)->withQueryString(),
            'title' => $title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sparepart.create', [
            'brands' => Brand::All(),
            'models' => Models::all(),
            'categories' => CategoriePart::all(),
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
            'categorie_id' => 'required',
            'models_id' => 'required',
            'name' => 'required|max:100',
            'merk' => 'required:max:50',
            'slug' => 'required|unique:spareparts',
            'codePart' => 'required',
        ]);

        sparepart::create($validatedData);

        return redirect('/dashboard/spareparts')->with(
            'success',
            'New Sparepart Data Has Been aded.!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function show(sparepart $sparepart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function edit(sparepart $sparepart)
    {
        return view('dashboard.sparepart.edit', [
            'part' => $sparepart,
            'brands' => Brand::All(),
            'models' => Models::all(),
            'categories' => CategoriePart::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sparepart $sparepart)
    {
        $rules = [
            'categorie_id' => 'required',
            'models_id' => 'required',
            'name' => 'required|max:100',
            'merk' => 'required:max:50',
            'codePart' => 'required',
        ];
        if ($request->slug != $sparepart->slug) {
            $rules['slug'] = 'required|unique:spareparts';
        }

        $validatedData = $request->validate($rules);

        sparepart::where('id', $sparepart->id)->update($validatedData);

        return redirect('/dashboard/spareparts')->with(
            'success',
            'Unit Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sparepart  $sparepart
     * @return \Illuminate\Http\Response
     */
    public function destroy(sparepart $sparepart)
    {
        sparepart::destroy($sparepart->id);

        return redirect('/dashboard/spareparts')->with(
            'success',
            'New Sparepart Data Has Been Deleted.!'
        );
    }

    public function getmodels(Request $request)
    {
        $models = Models::where('brand_id', $request->brand)->get();
        return response()->json($models);
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(
            sparepart::class,
            'slug',
            $request->name
        );
        return response()->json(['slug' => $slug]);
    }
    public function fileImportCreate()
    {
        return view('dashboard.sparepart.file-import-create');
    }

    public function fileImport(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new sparepartImport(), $validatedData['excl']);
            return redirect('/dashboard/spareparts')->with(
                'success',
                'New Models Units Has Been Aded.!'
            );
        }
    }
    // public function cari(Request $request)
    // {
    //     $sparepart = sparepart::where(
    //         'categorie_id',
    //         $request->categori
    //     )->get();
    //     return response()->json($sparepart);
    // }


}
