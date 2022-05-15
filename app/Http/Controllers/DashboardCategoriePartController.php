<?php

namespace App\Http\Controllers;

use App\Models\CategoriePart;
use App\Models\sparePart;
use Illuminate\Http\Request;
use App\Imports\CategoriePartImport;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Maatwebsite\Excel\Facades\Excel;

class DashboardCategoriePartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.sparepart.category.index', [
            'categories' => CategoriePart::latest()
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.sparepart.category.create');
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
            'name' => 'required',
            'slug' => 'required|unique:categorie_parts',
        ]);

        CategoriePart::create($validatedData);

        return redirect('/dashboard/sparepart/categorieParts')->with(
            'success',
            'Category Sparepart Data Has Been Aded.!'
        );
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
        return view('dashboard.sparepart.category.edit', [
            'category' => $categoriePart,
        ]);
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
        $rules = [
            'name' => 'required',
        ];

        if ($request->slug != $categoriePart->slug) {
            $rules['slug'] = 'required|unique:categorie_parts';
        }

        $validatedData = $request->validate($rules);
        CategoriePart::where('id', $categoriePart->id)->update($validatedData);

        return redirect('/dashboard/sparepart/categorieParts')->with(
            'success',
            'Category Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriePart  $categoriePart
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriePart $categoriePart)
    {
        sparepart::where('categorie_id', $categoriePart->id)->delete();

        CategoriePart::destroy($categoriePart->id);

        return redirect('/dashboard/sparepart/categorieParts')->with(
            'success',
            'Category Sparepart Data Has Been Deleted.!'
        );
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
        return view('dashboard.sparepart.category.file-import-create');
    }

    public function fileImport(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new CategoriePartImport(), $validatedData['excl']);
            return redirect('/dashboard/sparepart/categorieParts')->with(
                'success',
                'New Category Sparepart Has Been Aded.!'
            );
        }
    }
}
