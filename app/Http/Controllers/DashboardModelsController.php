<?php

namespace App\Http\Controllers;

use App\Models\Models;
use App\Imports\ModelsImport;
use App\Models\Brand;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Maatwebsite\Excel\Facades\Excel;

class DashboardModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.unit.models.index', [
            'models' => Models::latest()->Paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.unit.models.create', [
            'brands' => Brand::all(),
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
            'brand_id' => 'required',
            'name' => 'required|max:20|unique:models',
            'slug' => 'required|unique:models',
        ]);

        Models::create($validatedData);

        return redirect('/dashboard/unit/models')->with(
            'success',
            'New Unit Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function show(Models $models)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function edit(Models $model)
    {
        return view('dashboard.unit.models.edit', [
            'models' => $model,
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Models $model)
    {
        $rules = [
            'brand_id' => 'required',
        ];

        if ($request->slug != $model->slug) {
            $rules['slug'] = 'required|unique:models';
        }
        if ($request->name != $model->name) {
            $rules['name'] = 'required|max:20|unique:models';
        }

        $validatedData = $request->validate($rules);

        Models::where('id', $model->id)->update($validatedData);

        return redirect('/dashboard/unit/models')->with(
            'success',
            'New Unit Has Been Update.'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models  $models
     * @return \Illuminate\Http\Response
     */
    public function destroy(Models $model)
    {
        Models::destroy($model->id);

        return redirect('/dashboard/unit/models')->with(
            'success',
            'Data Has Been Delete!'
        );
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Models::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function fileImportCreate()
    {
        return view('dashboard.unit.models.file-import-create');
    }

    public function fileImport(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new ModelsImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/models')->with(
                'success',
                'New Models Units Has Been Aded.!'
            );
        }
    }
}