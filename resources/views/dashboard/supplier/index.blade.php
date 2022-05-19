@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">SUPPLIER LIST</h1>
</div>

<div class="table-responsive">
    <a href="/dashboard/suppliers/create" class="btn btn-primary mb-3"
    > <span data-feather="plus-circle"></span></a
>
    <!-- Alert -->
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
        {{ session("success") }}
    </div>
    @endif
    
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Address</th>
          <th scope="col">Telp</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @if($suppliers->count())
        @foreach($suppliers as $suplier)
        <tr>
            <td>{{ ($suppliers->currentpage()-1) * $suppliers->perpage() + $loop->index + 1 }}</td>
            <td>{{ $suplier->name }}</td>
            <td>{{ $suplier->address }}</td>
            <td>{{ $suplier->telp }}</td>
            <td>
            <a
            href="/dashboard/suppliers/{{ $suplier->slug }}/edit"
            class="badge bg-warning"
            ><span data-feather="edit"></span
        ></a>
        <form
            action="/dashboard/suppliers/{{ $suplier->slug }}"
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
      @endforeach

      @else
      <tr><td colspan="10" class="text-center">Data Masih Kosong</td></tr>
      @endif
      </tbody>
    </table>
  </div>
  <div class="col-md-8">
    {{ $suppliers->links() }}   
</div>
@endsection