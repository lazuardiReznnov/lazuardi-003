@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Unit : {{ $unit->noReg }}</h1>
  
 </div>
 <div class="row">
     <div class="col-md-8">
        <a href=" /dashboard/units" class="btn btn-success"><span data-feather='arrow-left'></span> Back</a>
        <a href="/dashboard/units/{{ $unit->slug }}/edit" class="btn btn-warning"><span data-feather='eye'></span> Edit</a>
        <form action="/dashboard/units/{{ $unit->slug }}" method="post" class="d-inline">
         @method('delete')
         @csrf
         <button class="btn btn-danger" ><span data-feather="x-circle"></span> Delete</button>
     </form>
     </div>
 </div>
 <div class="row">
     <div class="col-md-10">
         
         <div class="row mt-5">
             <div class="col-md-4">
                @if($unit->img)
                <div style="max-height: 350px; overflow:hidden">
                  <img src="{{ asset('storage/'. $unit->img) }}" class="card-img-top img-thumbnail rounded-circle mt-3" alt="..." class="img-fluid">    
                </div>
                @else
                <img src="  https://source.unsplash.com/400x400/?car" class="card-img-top img-thumbnail rounded-circle mt-3" alt="..." class="img-fluid">
                @endif
             </div>
             <div class="col-md-6">
                <ul class="list-group list-group-flush fs-6 mt-4">
                    <li class="list-group-item"><span class="fw-bold">Merk/Model :</span> {{ $unit->models->brand->name }}  {{ $unit->models->name }}</li>
                    <li class="list-group-item"><span class="fw-bold">Type : </span> {{ $unit->type->title }}</li>
                    <li class="list-group-item"><span class="fw-bold">Vin : </span> {{ $unit->vin }}</li>
                    <li class="list-group-item"><span class="fw-bold">Engine Number : </span> {{ $unit->engineNum }}</li>
                    <li class="list-group-item"><span class="fw-bold">Color : </span> {{ $unit->color }}</li>
                    <li class="list-group-item"><span class="fw-bold">Year : </span> {{ $unit->year }}</li>
                    <li class="list-group-item"><span class="fw-bold">Owner : </span> {{ $unit->owner->name }}</li>
                  </ul>
             </div>
         </div>
     </div>
 </div>
@endsection