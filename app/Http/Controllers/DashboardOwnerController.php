<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Imports\OwnerImport;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\support\Facades\Storage;
use App\Models\Unit;

class DashboardOwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.owner.index', [
            'owners' => Owner::latest()
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
        return view('dashboard.owner.create');
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
            'name' => 'required|unique:owners',
            'slug' => 'required|unique:owners',
            'address' => 'required',
            'email' => 'required|email:dns',
            'phone' => 'required',
            'img' => 'image|file|max:2048',
        ]);

        if ($request->file('img')) {
            $validatedData['img'] = $request->file('img')->store('owner-img');
        }

        Owner::create($validatedData);

        return redirect('/dashboard/owners')->with(
            'success',
            'New Owner Has Been aded.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('dashboard.owner.edit', [
            'owner' => $owner,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $rules = [
            'address' => 'required',
            'email' => 'required|email:dns',
            'phone' => 'required',
            'img' => 'image|file|max:2048',
        ];

        if ($request->name != $owner->name) {
            $rules['name'] = 'required|unique:owners';
        }
        if ($request->slug != $owner->slug) {
            $rules['slug'] = 'required|unique:owners';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('img')) {
            if ($request->old_img) {
                storage::delete($request->old_img);
            }
            $validatedData['img'] = $request->file('img')->store('owner-img');
        }

        Owner::Where('id', $request->id)->update($validatedData);
        return redirect('/dashboard/owners')->with(
            'success',
            'Owner Has Been Updated.!'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        Owner::destroy($owner->id);
        Unit::where('owner_id', $owner->id)->delete();
        if ($owner->img) {
            storage::delete($owner->img);
        }
        return redirect('/dashboard/owners')->with(
            'success',
            'Owner Has Been Deleted.'
        );
    }

    public function slug(Request $request)
    {
        $slug = SlugService::createSlug(Owner::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }

    public function fileImportCreate()
    {
        return view('dashboard.owner.file-import-create');
    }

    public function fileImport(Request $request)
    {
        $validatedData = $request->validate([
            'excl' => 'required:mimes:xlsx,xls,csv|max:2048',
        ]);

        if ($request->file('excl')) {
            Excel::import(new OwnerImport(), $validatedData['excl']);
            return redirect('/dashboard/owners')->with(
                'success',
                'New Owners Has Been Aded.!'
            );
        }
    }
}
