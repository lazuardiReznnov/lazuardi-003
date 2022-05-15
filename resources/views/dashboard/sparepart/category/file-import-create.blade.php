@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Input New Models VIa Excel</h1>
</div>
<div class="row my-4">
    <div class="col-md">
        <a
            href="/dashboard/unit/models"
            class="btn btn-primary mb-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Back"
            ><span data-feather="skip-back"></span>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/sparepart/categorieParts/file-import"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="mb-3">
                <label for="image" class="form-label">Upload Excel</label>

                <input
                    class="form-control @error('excl') is-invalid @enderror"
                    type="file"
                    id="excl"
                    name="excl"
                    placeholder="choice file"
                />
                @error('excl')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>

@endsection
