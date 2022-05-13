@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">UNIT LIST</h1>
</div>
<div class="row">
    <div class="col-md-6 ms-auto">
        <a
            href="/dashboard/units/create"
            class="btn btn-primary mb-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Unit Data"
            ><span data-feather="plus-circle"></span>
        </a>
        <a
            href="/dashboard/unit/file-import-create"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Unit Data Via Excel"
            class="btn btn-primary mb-3"
            ><span data-feather="file-text"></span>
        </a>
    </div>
</div>

<div class="table-responsive col-lg-8">
    <!-- Alert -->
    @if(session()->has('success'))
    <div class="alert alert-success col-md-5" role="alert">
        {{ session("success") }}
    </div>
    @endif

    <!-- data Tables -->
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Reg Number</th>
                <th scope="col">Merk</th>
                <th scope="col">Type</th>
                <th scope="col">Model</th>
                <th scope="col">Owner</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($units->count()) @foreach($units as $unit)
            <tr>
                <td>
                    {{ ($units->currentpage()-1) * $units->perpage() + $loop->index + 1 }}
                </td>
                <td>{{ $unit->noReg }}</td>
                <td>{{ $unit->models->brand->name }}</td>
                <td>{{ $unit->type->title }}</td>
                <td>{{ $unit->models->name }}</td>
                <td>{{ $unit->Owner->name }}</td>
                <td>
                    <a
                        href="/dashboard/units/{{$unit->slug }}"
                        class="badge bg-info"
                        ><span data-feather="eye"></span
                    ></a>
                    <a
                        href="/dashboard/units/{{$unit->slug }}/edit"
                        class="badge bg-warning"
                        ><span data-feather="edit"></span
                    ></a>
                    <form
                        action="/dashboard/units/{{ $unit->slug }}"
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
                <td colspan="4" class="text-center">Data Not Found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-8">
        {{ $units->links() }}
    </div>
</div>
@endsection
