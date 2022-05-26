@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">LETTERS DATA</h1>
</div>

<!-- Alert -->
<div class="row">
    <div class="col-md-8">
        <!-- Alert -->
        @if(session()->has('success'))
            <div class="alert alert-success col-md-5" role="alert">
                {{ session("success") }}
            </div>
        @endif
    </div>
</div>
<div class="table-responsive col-lg-12">

<div class="col-md-5">
  
</div>
<!-- data Tables -->
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Unit</th>
            <th scope="col">Type</th>
            <th scope="col">Date Taxt</th>
            <th scope="col">Date Reg</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($letters->count()) @foreach($letters as $letter)
        <tr>
            <td>
                {{ ($letters->currentpage()-1) * $letters->perpage() + $loop->index + 1 }}
            </td>
            <td>{{ $letter->unit->noReg }}</td>
            <td>{{ $letter->type}}</td>
            <td>{{ $letter->taxt }}</td>
            <td>{{ $letter->reg }}</td>
            <td>
                <a
                    href="/dashboard/letters/{{$letter->id }}"
                    class="badge bg-info"
                    ><span data-feather="eye"></span
                ></a>
                <a
                    href="/dashboard/letters/{{$letter->id }}/edit"
                    class="badge bg-warning"
                    ><span data-feather="edit"></span
                ></a>
                <form
                    action="/dashboard/letters/{{ $letter->id }}"
                    method="post"
                    class="d-inline"
                >
                    @method('delete') @csrf
                    <button
                        class="badge bg-danger border-0"
                        onclick="return confirm('are You sure ??')"
                    >
                        <span data-feather="x-circle"></span>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach @else
        <tr>
            <td colspan="7" class="text-center">Data Not Found</td>
        </tr>
        @endif
    </tbody>
</table>
</div>
<div class="row">
<div class="col-md-8">
    {{ $letters->links() }}
</div>
</div>
@endsection
