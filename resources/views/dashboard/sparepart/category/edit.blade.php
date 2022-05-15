@extends('dashboard.layouts.main') 
@section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Edit Form Category Sparepart Data</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/sparepart/categorieParts/{{ $category->slug }}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    id="name"
                    value="{{ old('name',$category->name) }} "
                    
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
                    value="{{ old('slug', $category->slug) }} "
                    readonly
                />
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
 
  
            <button type="submit" class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div> 
<script type="text/javascript">

   const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    name.addEventListener("change", function () {
        fetch("/dashboard/sparepart/categorieParts/slug?name=" + name.value)
            .then((response) => response.json())
            .then((data) => (slug.value = data.slug));
    });
   
   </script>
@endsection

