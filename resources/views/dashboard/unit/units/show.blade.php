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
    <div class="row mb-4">
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
                        <li class="list-group-item"><span class="fw-bold">Grup : </span> {{ $unit->grup->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- surat-surat -->
    <h2 class="mb-3">Surat-surat</h2>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist mt-3">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="pills-STNK-tab" data-bs-toggle="pill" data-bs-target="#pills-STNK" type="button" role="tab" aria-controls="pills-STNK" aria-selected="true">STNK</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-KIR-tab" data-bs-toggle="pill" data-bs-target="#pills-KIR" type="button" role="tab" aria-controls="pills-KIR" aria-selected="false">KIR</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="pills-documents-tab" data-bs-toggle="pill" data-bs-target="#pills-documents" type="button" role="tab" aria-controls="pills-documents" aria-selected="false">DOCUMENTS</button>
        </li>
      </ul>
      <div class="tab-content col-md-6" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-STNK" role="tabpanel" aria-labelledby="pills-STNK-tab" tabindex="0">
          <dl class="row m-3 border p-3 rounded">
            <dt class="col-sm-3">Owner Name</dt>
            <dd class="col-sm-9">: PT,,, SSS</dd>
            <dt class="col-sm-3">Address</dt>
            <dd class="col-sm-9">: jl. ss</dd>
            <dt class="col-sm-3">Taxt Date </dt>
            <dd class="col-sm-9">: dd/mm/yy</dd>
            <dt class="col-sm-3"> Date </dt>
            <dd class="col-sm-9">: dd/mm/yy</dd>
            <dt class="col-sm-3"> Area </dt>
            <dd class="col-sm-9">: </dd>
            
          </dl>
        </div>
        <div class="tab-pane fade" id="pills-KIR" role="tabpanel" aria-labelledby="pills-KIR-tab" tabindex="0">
          <dl class="row m-3 border p-3 rounded">
            <dt class="col-sm-3">Owner Name</dt>
            <dd class="col-sm-9">: PT,,, SSS</dd>
            <dt class="col-sm-3">Address</dt>
            <dd class="col-sm-9">: jl. ss</dd>
            <dt class="col-sm-3">Taxt Date </dt>
            <dd class="col-sm-9">: dd/mm/yy</dd>
            <dt class="col-sm-3"> Date </dt>
            <dd class="col-sm-9">: dd/mm/yy</dd>
            <dt class="col-sm-3"> Area </dt>
            <dd class="col-sm-9">: </dd>
            
          </dl>
        </div>
        <div class="tab-pane fade" id="pills-documents" role="tabpanel" aria-labelledby="pills-documents-tab" tabindex="0">...</div>

      </div>

<!--Report  -->
<h2 class="mb-3">Report</h2>
@endsection