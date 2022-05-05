
@extends('dashboard.layouts.main')
@section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Maintenance Unit List</h1>
</div>

<div class="table-responsive col-lg-12">
    <a href="/dashboard/maintenances/create" class="btn btn-primary mb-3"
        ><span data-feather="plus-circle"></span> Add </a
    >

    <!-- Alert -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session("success") }}
    </div>
    @endif

    <!-- data Tables -->
    <table class="table table-striped table-lg">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Unit</th>
                <th scope="col">Problem</th>
                <th scope="col">Mechanic</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($tenances->count()) @foreach($tenances as $tenance)
           
            <tr>
                <td>
                    {{ ($tenances->currentpage()-1) * $tenances->perpage() + $loop->index + 1 }}
                </td>
                <td>{{ \Carbon\Carbon::parse($tenance->date)->format('d/m/Y') }}</td>
                <td>{{ $tenance->unit->noReg }}</td>
                <td>{{ Illuminate\Support\str::of($tenance->problem)->limit(20) }}</td>
                <td>{{ $tenance->mechanic }}</td>
                <td>{{ $tenance->status }}</td>
                <td>
                    <a
                        href="/dashboard/maintenances/{{$tenance->id }}"
                        class="badge bg-info mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail"
                        ><span data-feather="eye"></span
                    ></a>
                    <a
                    href="/dashboard/maintenance/print/{{$tenance->id }}"
                    class="badge bg-success mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="print SPK"
                    ><span data-feather="printer"></span></a>
                    <a
                        href="/dashboard/maintenances/{{$tenance->id }}/edit"
                        class="badge bg-warning mb-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"
                        ><span data-feather="edit"></span
                    ></a>
                    <form
                        action="/dashboard/maintenances/{{ $tenance->id }}"
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
            @endforeach @else
            <tr>
                <td colspan="6" class="text-center">Data Not Found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-8">
        {{ $tenances->links() }}
    </div>
</div>

@endsection