@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">SPAREPART LIST</h1>
</div>
<div class="row">
    <div class="col-md-6">
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
            href="/dashboard/sparepart/categories/create"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Category Sparepart Data"
            class="btn btn-primary mb-3"
        >
            <span data-feather="plus-circle"></span
        ></a>
        <a
            href="/dashboard/sparepart/categories/file-import-create"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="Create New Category Sparepart Data Via excel"
            class="btn btn-primary mb-3"
        >
            <span data-feather="file-text"></span
        ></a>
    </div>
</div>

<div class="table-responsive col-lg-8">
    <!-- data Tables -->
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="get">
            @if($categories->count()) @foreach($categories as $category)
            <tr>
                <td>
                    {{ ($categories->currentpage()-1) * $categories->perpage() + $loop->index + 1 }}
                </td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>

                <td>
                    <a
                        href="/dashboard/sparepart/categories/{{ $category->slug }}/edit"
                        class="badge bg-warning"
                        data-bs-toggle="tooltip"
                        data-bs-placement="top"
                        title="Edit"
                        ><span data-feather="edit"></span
                    ></a>
                    <form
                        action="/dashboard/sparepart/categories/{{ $category->slug }}"
                        method="post"
                        class="d-inline"
                    >
                        @method('delete') @csrf
                        <button
                            class="badge bg-danger border-0"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="Delete"
                            onclick="return confirm('are You sure ??')"
                        >
                            <span data-feather="x-circle"></span>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach @else
            <tr>
                <td colspan="7" class="text-center">Data Masih Kosong</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>

<div class="col-md-8">
    {{ $categories->links() }}
</div>
@endsection
