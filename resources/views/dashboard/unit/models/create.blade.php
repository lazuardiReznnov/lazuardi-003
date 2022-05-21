@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Form New Models</h1>
</div>

<div class="row">
    <div class="col-lg-8">
        <form
            action="/dashboard/unit/models"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

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
                <label for="name" class="form-label">Models Name</label>
                <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}"
                    id="name"
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
            <button type="submit" class="btn btn-primary">Create Models Unit</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");
    const link ="/dashboard/unit/model/slug?name=";
    
   makeslug(name,slug,link);        

    const brand = document.querySelector('#brand')
    const models = document.querySelector('#models')
    const link2 = '/dashboard/unit/getmodels?brand=';

    makeBrand(brand,models,link2);
</script>
@endsection
