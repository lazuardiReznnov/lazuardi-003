@extends('dashboard.layouts.main')
@section('container')

<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2 text-uppercase">Maintenance Unit : {{ $maintenance->unit->noReg }}</h1>
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
              <li class="list-group-item text-white fw-semibold bg-dark" aria-current="true">{{ $maintenance->unit->noReg }}</li>
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
        <li class="list-group-item bg-dark text-white fw-semibold" aria-current="true">Repair Status</li>
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
  <div class="card col-md-8">
    <div class="card-header bg-dark text-white fw-semibold">
      REPAIR DETAIL
    </div>
    <div class="card-body">
      <dl class="row">
        <dt class="col-sm-3">Date</dt>
        <dd class="col-sm-9">: {{ \Carbon\Carbon::parse($maintenance->date)->format('d F Y') }}</dd>
      </dl>
      <dl class="row">
        <dt class="col-sm-3">Problem Description</dt>
        <dd class="col-sm-9">: {{$maintenance->problem}}</dd>
      </dl>
      <dl class="row">
        <dt class="col-sm-3">Diagnose Description</dt>
        <dd class="col-sm-9">: {{$maintenance->analysis}}</dd>
      </dl>
    </div>
  </div>
 

  </section>


<section id="part">
     


<div class="card col-8">
  <div class="card-header bg-dark text-white fw-semibold">
    SPAREPART
  </div>
  <div class="card-body">
    <a href="/dashboard/maintenance/partTenances/{{$maintenance->id}}" class="btn btn-dark mb-3"
      ><span data-feather="plus-circle"></span>
      </a>
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
                href="/dashboard/maintenance/partTenances/{{$part->id }}/edit"
                class="badge bg-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                ><span data-feather="edit"></span
            ></a>
            <form
                action="/dashboard/maintenance/partTenances/{{ $part->id }}"
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
  </div>
</div>

</section>
@endsection