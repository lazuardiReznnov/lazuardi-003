<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Imports\TypeImport;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Auth\Events\Validated;
use Maatwebsite\Excel\Facades\Excel;

class DashboardTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.unit.types.index', [
            'types' => Type::latest()
                ->paginate(7)
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
        return view('dashboard.unit.types.create');
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
            'title' => 'required|max:50',
            'slug' => 'required|unique:types',
        ]);

        Type::create($validatedData);

        return redirect('/dashboard/unit/types')->with(
            'success',
            'Data Has been aded!'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('dashboard.unit.types.edit', [
            'type' => $type,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $rules = [
            'title' => 'required|max:50',
        ];
        if ($request->slug != $type->slug) {
            $rules['slug'] = 'required|unique:types';
        }
        $validatedData = $request->validate($rules);

        Type::where('id', $type->id)->update($validatedData);

        return redirect('dasboard/unit/types')->with(
            'success',
            'Data Has Been Updated!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        Type::destroy($type->id);

        return redirect('/dashboard/unit/types')->with(
            'success',
            'Data Has Been Delete!'
        );
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Type::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function fileImportCreate(){
        return view('dashboard.unit.types.file-import-create');
    }

    public function fileImport(Request $request){
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new TypeImport(), $validatedData['excl']);
            return redirect('/dashboard/unit/types')->with(
                'success',
                'New Type Units Has Been Aded.!'
            );
        }
    }
}
