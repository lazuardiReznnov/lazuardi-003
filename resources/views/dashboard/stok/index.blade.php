@extends('dashboard.layouts.main') @section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">IN OUT STOCK DATA</h1>
</div>

<div class="table-responsive">
    <a href="/dashboard/stocks/create" class="btn btn-primary mb-3"
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
          <th scope="col">type</th>
          <th scope="col">Date</th>
          <th scope="col">Inv</th>
          <th scope="col">Store Name</th>
          <th scope="col">Sparepart</th>
          <th scope="col">qty</th>
          <th scope="col">Price</th>
          <th scope="col">Total</th>
          <th scope="col">Action</th>
          
        </tr>
      </thead>
      <tbody>
        @if($stocks->count())
        @foreach($stocks as $stock)
        <tr>
            <td>{{ ($stocks->currentpage()-1) * $stocks->perpage() + $loop->index + 1 }}</td>
            <td>{{ $stock->type }}</td>
            <td>{{ date('d/m/Y', strtotime($stock->date)) }}</td>
            <td>{{ $stock->inv }}</td>
            <td>{{ $stock->store_name }}</td>
            <td>{{ $stock->sparepart->name }}</td>
            <td>{{ $stock->qty }}</td>
            <td>@currency($stock->price)</td>
            <td>@currency($stock->price*$stock->qty)</td>
            <td>
            <a
            href="/dashboard/stocks/{{ $stock->id }}/edit"
            class="badge bg-warning"
            ><span data-feather="edit"></span
        ></a>
        <form
            action="/dashboard/stocks/{{ $stock->id }}"
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
    {{ $stocks->links() }}   
</div>
@endsection