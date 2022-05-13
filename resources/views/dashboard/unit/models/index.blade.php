@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Models List</h1>
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
            href="/dashboard/unit/models/create"
            class="btn btn-primary mb-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Models Data"
            ><span data-feather="plus-circle"></span>
        </a>
        <a
            href="/dashboard/unit/file-import-create"
            class="btn btn-primary mb-3"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Models Data Via Excel"
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
                <th scope="col">Merk</th>
                <th scope="col">Models Name</th>
                <th scope="col">Models Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($models->count()) @foreach($models as $model)
            <tr>
                <td>
                    {{ ($models->currentpage()-1) * $models->perpage() + $loop->index + 1 }}
                </td>
                <td>{{ $model->brand->name }}</td>
                <td>{{ $model->name }}</td>
                <td>{{ $model->slug }}</td>

                <td>
                    <a
                        href="/dashboard/unit/models/{{$model->slug}}/edit"
                        class="badge bg-warning"
                        ><span data-feather="edit"></span
                    ></a>
                    <form
                        action="/dashboard/unit/models/{{ $model->slug }}"
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
        {{ $models->links() }}
    </div>
</div>
@endsection
