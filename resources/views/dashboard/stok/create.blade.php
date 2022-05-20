@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Form Input Stock</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/stocks"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
                    @if(old('type')=='type')
                    <option value="{{ old('type') }}" selected>
                        {{ old("type") }}
                    </option>
                    @else
                    <option value="" selected>--Select Buying Type--</option>
                    <option value="cash">Cash</option>
                    <option value="credit">Credit</option>
                    @endif
                </select>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input
                    type="date"
                    name="date"
                    class="form-control @error('date') is-invalid @enderror"
                    id="date"
                    value="{{ old('date') }} "
                />
                @error('date')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inv" class="form-label">No. Invoice</label>
                <input
                    type="text"
                    name="inv"
                    class="form-control @error('inv') is-invalid @enderror"
                    id="inv"
                    value="{{ old('inv') }} "
                    placeholder="inv"
                />
                @error('inv')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="store_name" class="form-label">Supplier</label>
                <select class="form-select" id="supplier" name="supplier_id">
                    <option value="" selected>--Select Supplier--</option>
                    @foreach($suppliers as $supplier)
                    @if(old('supplier_id')==$supplier->id)
                    <option value="{{ $supplier->id }}" selected>
                        {{ $supplier->name }}
                    </option>
                    @endif
                    <option value="{{ $supplier->id }}">
                        {{ $supplier->name }}
                    </option>
                    @endforeach
                </select>
                <!-- <input
                    type="text"
                    name="store_name"
                    class="form-control @error('store_name') is-invalid @enderror"
                    id="store_name"
                    value="{{ old('store_name') }} "
                /> -->

                @error('supplier_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categori" class="form-label"
                    >Sparepart Categories</label
                >
                <select class="form-select" id="categorie" name="categorie_id">
                    <option value="" selected>--Select Categories--</option>
                    @foreach($categories as $categorie)
                    @if(old('categorie_id')==$categorie->id)
                    <option value="{{ $categorie->id }}" selected>
                        {{ $categorie->name }}
                    </option>
                    @endif
                    <option value="{{ $categorie->id }}">
                        {{ $categorie->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="sparepart" class="form-label">Sparepart</label>
                <select
                    class="form-select"
                    id="sparepart"
                    name="sparepart_id"
                ></select>
            </div>

            <div class="mb-3 col-md-3">
                <label for="qty" class="form-label">Qty</label>
                <input
                    type="text"
                    name="qty"
                    class="form-control @error('qty') is-invalid @enderror"
                    id="qty"
                    value="{{ old('qty') }} "
                />
                @error('qty')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3 col-md-5">
                <label for="price" class="form-label">price</label>
                <input
                    type="text"
                    name="price"
                    class="form-control @error('price') is-invalid @enderror"
                    id="price"
                    value="{{ old('price') }} "
                />
                @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    const categoripart = document.querySelector("#categorie");
    const sparepart = document.querySelector("#sparepart");

    categoripart.addEventListener("change", function () {
        fetch(
            "/dashboard/stock/getsparepart?categoripart=" + categoripart.value
        )
            .then((response) => response.json())
            .then((response) => {
                const m = response;
                let card = "<option>--Select Sparepart---</option>";
                m.forEach(
                    (m) =>
                        (card +=
                            '<option value="' +
                            m.id +
                            '">' +
                            m.name +
                            " - " +
                            m.models.brand.name +
                            "   " +
                            m.models.name +
                            "</option>")
                );
                sparepart.innerHTML = card;
            });
    });

    //    const name = document.querySelector("#name");
    //     const slug = document.querySelector("#slug");

    //     name.addEventListener("change", function () {
    //         fetch("/dashboard/sparepart/slug?name=" + name.value)
    //             .then((response) => response.json())
    //             .then((data) => (slug.value = data.slug));
    //     });
</script>
@endsection
