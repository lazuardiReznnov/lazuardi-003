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
      <form action="/dashboard/parts" method="get" class="d-inline">
        <div class="input-group">
            <select class="form-select" id="categori" name="categori" >
              <option selected>Choose...</option>
              @foreach($categories as $categori)
                <option value="{{ $categori->id }}">{{ $categori->name }}</option>
              @endforeach
            </select>
            <button class="btn btn-outline-secondary" id="cari" type="submit"> <span data-feather="search"></span></button>
          </div>
        </form>
    </div>
    <!-- data Tables -->
    <table class="table table-striped table-sm">
        <thead>
            <tr>
              
                <th scope="col">#</th>
                <th scope="col">Merk</th>
                <th scope="col">Models</th>
                <th scope="col">Name</th>
                <th scope="col">Code Part</th>
                <th scope="col">Qty</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="get">
           @if($parts->count())
           @foreach($parts as $part)
           <tr>
               <td>{{ ($parts->currentpage()-1) * $parts->perpage() + $loop->index + 1 }}</td>
               <td>{{ $part->models->brand->name }}</td>
               <td>{{ $part->models->name }}</td>
               <td>{{ $part->name }}</td>
               <td>{{ $part->codePart }}</td>
               <td>{{ $part->qty }}</td>
               <td>
                  <a href="" class="badge bg-danger text-decoration-none">Delete</a>
                  <a href="" class="badge bg-warning text-decoration-none">Edit</a>
              </td>
             </tr>
             @endforeach
             
          @else
            <tr><td colspan="7" class="text-center">Data Masih Kosong</td></tr>
            @endif
        </tbody>
    </table>
</div>

  <div class="col-md-8">
      {{ $parts->links() }}   
  </div>

<script>
// const categori = document.querySelector('#categori')
// const cari = document.querySelector('#cari')
// const get = document.querySelector('#get')

// cari.addEventListener('click', function () {

//   fetch('/dashboard/part/cari?categori=' + categori.value)
//     .then((response) => response.json())
//     .then((response) => {
      
//       const m = response
//       let card = ''
     
//       m.forEach(
//         (m) => (card += display(m)),
//       )
//       get.innerHTML = card
//     })
// })

// function display(m){
//   return ' <tr><td>' + m.merk + '</td><td>' +m.models.name +'</td><td>' + m.name +'</td><td> '+ m.codePart +'</td><td>'+ m.qty+' </td</tr>';
// }
// </script>
@endsection
