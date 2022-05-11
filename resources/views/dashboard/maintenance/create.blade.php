@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Form Maintenance</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/maintenances"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            <section id="link" class="my-3">
                <div class="row">
                    <div class="col">
                        <a
                            href="/dashboard/maintenances"
                            class="btn btn-primary mb-2"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="back"
                        >
                            <span data-feather="skip-back"></span
                        ></a>
                    </div>
                </div>
            </section>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input
                    type="date"
                    name="date"
                    class="form-control @error('date') is-invalid @enderror"
                    id="date"
                    value="{{ old('date') }} "
                    placeholder="date"
                />
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categori" class="form-label">Status</label>
                <select class="form-select" id="status" name="unit_id">
                    <option value="" selected>--Select Unit-</option>

                    @foreach($units as $unit) @if(old('unit_id')==$unit->id)
                    <option value="{{ $unit->id }}" selected>
                        {{ $unit->noReg}}
                    </option>
                    @endif
                    <option value="{{ $unit->id}}">
                        {{ $unit->noReg }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="problem" class="form-label"
                    >Problem Descriptions</label
                >
                <textarea
                    class="form-control @error('problem') is-invalid @enderror"
                    id="problem"
                    rows="3"
                    name="problem"
                ></textarea>
                @error('problem')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="analysis" class="form-label"
                    >Diagnose Descriptions</label
                >
                <textarea
                    class="form-control @error('analysis') is-invalid @enderror"
                    id="analysis"
                    rows="3"
                    name="analysis"
                ></textarea>
                @error('analysis')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mechanic" class="form-label">Mechanic Handle</label>
                <input
                    type="text"
                    class="form-control @error('mechanic') is-invalid @enderror"
                    id="mechanic"
                    placeholder="Mechanic Name"
                />
                @error('mechanic')
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
