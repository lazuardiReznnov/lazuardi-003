@extends('dashboard.layouts.main') @section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">FORM CREATE NEW SUPPLIER</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="/dashboard/suppliers/{{ $supplier->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Supplier Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name',$supplier->name) }}" autofocus required placeholder="X XXXX XXX" />
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" required class="form-control @error('slug') is-invalid @enderror" id="slug"
                    value="{{ old('slug', $supplier->slug) }} " readonly />
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 col-md-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="telp" class="form-control @error('telp') is-invalid @enderror" id="telp"
                    value="{{ old('telp', $supplier->telp) }}" placeholder="xxx-xxxxxxx" required/>

                @error('telp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email', $supplier->email) }}" placeholder="xxxx@xxx.xxx"required />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address " rows="3" required name="address">{{ old('address',$supplier->address) }}</textarea>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            

            <!-- <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <img class="img-preview img-fluid mb-2 col-sm-5" />
                <input class="form-control @error('img') is-invalid @enderror" type="file" id="img" name="img"
                    onchange="previewImage()" />
                @error('img')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div> -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    // slug post
    //  slug alternatif`
    const name = document.querySelector("#name");
    const slug = document.querySelector("#slug");

    // name.addEventListener('change', function () {
    //   let preslug = name.value
    //   preslug = preslug.replace(/ /g, '-')
    //   slug.value = preslug.toLowerCase()
    // });
    name.addEventListener("change", function () {
        fetch("/dashboard/supplier/slug?name=" + name.value)
            .then((response) => response.json())
            .then((data) => (slug.value = data.slug));
    });

</script>
@endsection
