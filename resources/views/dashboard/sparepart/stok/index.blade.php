@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">STOK LIST</h1>
</div>

<div class="table-responsive col-lg-10">
    <a href="/dashboard/parts/create" class="btn btn-primary mb-3"
        >Add New Stok</a
    >

    <!-- Alert -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session("success") }}
    </div>
    @endif

    <div class="col-md-5 my-4">
        <div class="input-group">
            <select class="form-select" id="categori">
              <option selected>Choose...</option>
              @foreach($categories as $categori)
                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
              @endforeach
            </select>
            <button class="btn btn-outline-secondary" id="cari" type="button">Search</button>
          </div>
    </div>
    <!-- data Tables -->
    <table class="table table-striped table-sm">
        <thead>
            <tr>
              
                <th scope="col">Merk</th>
                <th scope="col">Models</th>
                <th scope="col">Name</th>
                <th scope="col">Code Part</th>
                <th scope="col">Qty</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="get">
           
      
        </tbody>
    </table>
</div>
<script>
const categori = document.querySelector('#categori')
const cari = document.querySelector('#cari')
const get = document.querySelector('#get')

cari.addEventListener('click', function () {

  fetch('/dashboard/part/cari?categori=' + categori.value)
    .then((response) => response.json())
    .then((response) => {
      
      const m = response
      let card = ''
     
      m.forEach(
        (m) => (card += ' <tr><td>' + m.merk + '</td><td>' +m.models.name +'</td><td>' + m.name +'</td><td> '+ m.codePart +'</td><td>'+ m.qty+' </td</tr>'),
      )
      get.innerHTML = card
    })
})


</script>
@endsection
