@extends('dashboard.layouts.main') 
@section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Edit Sparepart</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/maintenance/partTenances/{{$partTenance->id}}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('put')
            <input type="hidden" name="maintenance_id" value="{{ $partTenance->maintenance_id }}">
            <div class="mb-3">
                <label for="categori" class="form-label">Sparepart Categories</label>
                <select class="form-select" id="categorie" name="categorie_id">
                    <option value="" selected>--Select Categories--</option>
                    @foreach($categories as $categorie) @if(old('categorie_id', $partTenance->sparepart->categorie_id)==$categorie->id)
                    <option value="{{ $categorie->id }}" selected>
                        {{ $categorie->name }}
                    </option>
                    @endif
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="sparepart" class="form-label">Sparepart</label>
                <select
                    class="form-select"
                    id="sparepart"
                    name="sparepart_id"
                >
                @if(old('sparepart_id',$partTenance->sparepart_id)==$partTenance->sparepart_id)
                <option value="{{ $partTenance->sparepart_id }}" selected>{{ $partTenance->sparepart->name }}</option> 
                @endif 
            </select>
            </div>

            
             <div class="mb-3 col-md-3">
                <label for="qty" class="form-label">Qty</label>
                <input
                    type="text"
                    name="qty"
                    class="form-control @error('qty') is-invalid @enderror"
                    id="qty"
                    value="{{ old('qty',$partTenance->qty) }} "
                    
                />
                @error('qty')
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
 

   const categoripart = document.querySelector('#categorie')
    const sparepart = document.querySelector('#sparepart')
   
   categoripart.addEventListener('change', function () {
       
     fetch('/dashboard/stock/getsparepart?categoripart=' + categoripart.value)
       .then((response) => response.json())
       .then((response) => {


         const m = response
         let card = '<option>--Select Sparepart---</option>'
         m.forEach(
           (m) => (card += '<option value="' + m.id + '">' + m.name + ' - ' +  m.models.brand.name + '   ' + m.models.name   + '</option>'),
         )
         sparepart.innerHTML = card
       })
   })

//    const name = document.querySelector("#name");
//     const slug = document.querySelector("#slug");

//     name.addEventListener("change", function () {
//         fetch("/dashboard/sparepart/slug?name=" + name.value)
//             .then((response) => response.json())
//             .then((data) => (slug.value = data.slug));
//     });
   
   </script>
@endsection

