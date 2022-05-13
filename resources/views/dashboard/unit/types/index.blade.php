@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">TYPE UNIT LIST</h1>
</div>

<div class="row">
    <div class="col-md-5">
        <!-- Alert -->
        @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session("success") }}
        </div>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-md-5 ms-auto">
        <a
            href="/dashboard/unit/types/create"
            class="btn btn-primary mb-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Type Unit"
            ><span data-feather="plus-circle"></span
        ></a>
        <a
            href="/dashboard/unit/types/file-import-create"
            class="btn btn-primary mb-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Type Unit Via Excel"
            ><span data-feather="file-text"></span>
        </a>
    </div>
</div>
<div class="table-responsive col-lg-8">
    <!-- data Tables -->
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($types->count()) @foreach($types as $type)
            <tr>
                <td>
                    {{ ($types->currentpage()-1) * $types->perpage() + $loop->index + 1 }}
                </td>
                <td>{{ $type->title }}</td>
                <td>{{ $type->slug }}</td>
                <td>
                    <a
                        href="/dashboard/unit/types/{{$type->slug }}/edit"
                        class="badge bg-warning"
                        ><span data-feather="edit"></span
                    ></a>
                    <form
                        action="/dashboard/unit/types/{{ $type->slug }}"
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
        {{ $types->links() }}
    </div>
</div>
@endsection
