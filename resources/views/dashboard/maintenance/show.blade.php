@extends('dashboard.layouts.main')
@section('container')

<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Maintenance Unit : {{ $maintenance->unit->noReg }}</h1>
</div>

<!-- Alert -->
@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session("success") }}
</div>
@endif

<section id="link" class="my-3">
<div class="row">
    <div class="col">
        <a
        href="/dashboard/maintenances"
        class="btn btn-primary mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="back">
    <span data-feather="skip-back"></span></a>
    <a
    href="/dashboard/maintenance/print/{{$maintenance->id }}"
    class="btn btn-success mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="print SPK"
    ><span data-feather="printer"></span></a>
    <a
        href="/dashboard/maintenances/{{$maintenance->id }}/edit"
        class="btn btn-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
        ><span data-feather="edit"></span
    ></a>
    <form
        action="/dashboard/maintenance/{{ $maintenance->id }}"
        method="post"
        class="d-inline"
    >
        @method('delete') @csrf
        <button
            class="btn btn-danger border-0 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
            onclick="return confirm('are You sure ??')"
        >
            <span data-feather="x-circle"></span>
        </button>
    </form>
    </div>
</div>

</section>

<section id="spek">
  <div class="row my-5">
      <div class="col-md-5">
          <ul class="list-group">
              <li class="list-group-item active" aria-current="true">{{ $maintenance->unit->noReg }}</li>
              <li class="list-group-item"><span class="fw-bold">Merk : </span>
                  {{ $maintenance->unit->Models->brand->name }} 
               {{ $maintenance->unit->models->name }}
              </li>
              <li class="list-group-item"><span class="fw-bold">Vin : </span>{{ $maintenance->unit->vin }}</li>
              <li class="list-group-item"><span class="fw-bold">Engine Number : </span>{{ $maintenance->unit->engineNum }}</li>
              <li class="list-group-item"><span class="fw-bold">Year : </span>{{ $maintenance->unit->year}}</li>
              <li class="list-group-item"><span class="fw-bold">Color : </span>{{ $maintenance->unit->color}}</li>
            </ul>
      </div>
      <div class="col-md-5">
        
      
      <ul class="list-group">
        <li class="list-group-item active" aria-current="true">STATUS PERBAIKAN</li>
        <li class="list-group-item"> 
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{ $maintenance->status }}%;" aria-valuenow="{{ $maintenance->status }}" aria-valuemin="0" aria-valuemax="100">{{ $maintenance->status }}%</div>
             </div>
            <p class="text-muted"> 
                @if($maintenance->status===0)
                  {{ 'Mulai Perbaikan' }} 
                @elseif($maintenance->status===25)
                  {{ 'Analisis' }}
                @elseif($maintenance->status===50)
                  {{'Part Wait'}}
                @elseif($maintenance->status===75)
                  {{'Fhinishing'}}
                @elseif($maintenance->status===100)
                  {{ 'End'}}
                @endif
            </p>
            <a
            href="/dashboard/maintenance/{{$maintenance->id }}/edit"
            class="btn btn-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Status"
            ><span data-feather="edit"></span
        ></a>
      </li>
       
      </ul>
  </div>
  </section>
  

<section id="problem" class="my-3">
  <h2>REPAIR DETAIL</h2>

  <div class="row p-2 mt-4">
      <div class="col-2 head">
        Date
      </div>
      <div class="col-8">
        : {{ \Carbon\Carbon::parse($maintenance->date)->format('d F Y') }}
      </div>
    </div>
  
    <div class="row p-2">
      <div class="col-2 head">
        Problem
      </div>
      <div class="col-8">
        : {{$maintenance->problem}}
      </div>
    </div>
    <div class="row p-2">
      <div class="col-2 head">
        
      </div>
      <div class="col-8">
        : {{$maintenance->analysis}}
      </div>
      <div class="row">
       
      </div>
  </section>


<section id="part">
     
<h2 class="mt-3">Sparepart</h2>
<a href="/dashboard/maintenance/partTenances/{{$maintenance->id}}" class="btn btn-primary mb-3"
><span data-feather="plus-circle"></span> Add </a
>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Code Part</th>
          <th scope="col">Qty</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($parts->count()) @foreach($parts as $part)
        <tr>
            <td> {{ ($parts->currentpage()-1) * $parts->perpage() + $loop->index + 1 }}</td>
            <td>{{ $part->sparepart->name }}</td>
            <td>{{ $part->sparepart->codePart }}</td>
            <td>{{ $part->qty }}</td>
            <td>
              <a
              href="/dashboard/maintenance/parttenances/{{$part->id }}/edit"
              class="badge bg-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
              ><span data-feather="edit"></span
          ></a>
          <form
              action="/dashboard/maintenance/parttenances/{{ $part->id }}"
              method="post"
              class="d-inline"
          >
              @method('delete') @csrf
              <button
                  class="badge bg-danger border-0 mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"
                  onclick="return confirm('are You sure ??')"
              >
                  <span data-feather="x-circle"></span>
              </button>
          </form>
            </td>
        </tr>
        @endforeach 
        @else
            <tr>
                <td colspan="6" class="text-center">Data Not Found</td>
            </tr>
        @endif
      
      </tbody>
    </table>
  </div>
</section>
@endsection