@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Input New Type VIa Excel</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/unit/types/file-import"
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
