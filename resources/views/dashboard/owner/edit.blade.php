@extends('dashboard.layouts.main') @section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">FORM EDIT OWNER</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="/dashboard/owners/{{ $owner->slug }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="name" class="form-label">Owner Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name', $owner->name) }}" autofocus required placeholder="X XXXX XXX" />
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" name="slug" required class="form-control @error('slug') is-invalid @enderror" id="slug"
                    value="{{ old('slug', $owner->slug) }} " readonly />
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address " rows="3" required name="address">{{ old('address',$owner->address) }}</textarea>
                @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" value="{{ old('email', $owner->email) }}" placeholder="xxxx@xxx.xxx"required />
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 col-md-4">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone"
                    value="{{ old('phone',$owner->phone) }}" placeholder="xxx-xxxxxxx" required/>

                @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                @if($owner->img)
                <input type="hidden" name="old_img" value="{{ $owner->img }}">
                <img src="{{ asset('storage/'. $owner->img) }}" class="d-block img-preview img-fluid mb-2 col-sm-5">
                @else
                <img class="img-preview img-fluid mb-2 col-sm-5" />
                @endif
                <input class="form-control @error('img') is-invalid @enderror" type="file" id="image" name="img"
                    onchange="previewImage()" />
                @error('img')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
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
        fetch("/dashboard/owner/slug?name=" + name.value)
            .then((response) => response.json())
            .then((data) => (slug.value = data.slug));
    });

</script>
@endsection
