@extends('dashboard.layouts.main') 
@section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Form Sparepart Data</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/spareparts"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="mb-3">
                <label for="categori" class="form-label">Sparepart Categories</label>
                <select class="form-select" id="categorie" name="categorie_id">
                    <option value="" selected>--Select Categories--</option>
                    @foreach($categories as $categorie) @if(old('categorie_id')==$categorie->id)
                    <option value="{{ $categorie->id }}" selected>
                        {{ $categorie->name }}
                    </option>
                    @endif
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <select class="form-select" id="brand" name="brand_id">
                    <option value="" selected>--Select Brand Unit--</option>
                    @foreach($brands as $brand) @if(old('brand_id')==$brand->id)
                    <option value="{{ $brand->id }}" selected>
                        {{ $brand->name }}
                    </option>
                    @endif
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="Models" class="form-label">Models</label>
                <select
                    class="form-select"
                    id="models"
                    name="models_id"
                ></select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    value="{{ old('name') }} "
                    
                />
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input
                    type="text"
                    name="slug"
                    class="form-control @error('slug') is-invalid @enderror"
                    id="slug"
                    value="{{ old('slug') }} "
                    readonly
                />
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input
                    type="text"
                    name="merk"
                    class="form-control @error('merk') is-invalid @enderror"
                    id="merk"
                    value="{{ old('merk') }} "
                    
                />
                @error('merk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
 
            <div class="mb-3">
                <label for="codePart" class="form-label">Code Part</label>
                <input
                    type="text"
                    name="codePart"
                    class="form-control @error('codePart') is-invalid @enderror"
                    id="codePart"
                    value="{{ old('codePart') }} "
                    
                />
                @error('codePart')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create Models Unit</button>
        </form>
    </div>
</div> 
<script type="text/javascript">
 
    const brand = document.querySelector('#brand')
    const models = document.querySelector('#models')
    const link2 = '/dashboard/sparepart/getmodels?brand=';
 
    makeBrand(brand,models,link2);


    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    const link ="/dashboard/sparepart/slug?name=";

    makeslug(name,slug,link);
   </script>
@endsection

