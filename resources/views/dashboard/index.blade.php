@extends('dashboard.layouts.main') @section('container')

<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Dashboard</h1>
</div>
<div class="container">
    <!-- <div class=" mb-4 bg-light rounded-3">
    <div class="container-fluid py-2 text-center">
      <img src="/img/ardi.jpg" width="300" class="rounded-circle mb-3">
      <h1 class="display-5 fw-bold">MOHAMAD LAZUARDI NOOR</h1>
      <p class="text-muted">Full Stage Developer | Administration</p>
     
    </div>
  </div> -->
    <div class="row">
        <div class="col-md-4">
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">TOTAL Rute</h5>
                    <p class="card-text">10</p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">TOTAL UNIT</h5>
                    <p class="card-text">10</p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" style="width: 18rem">
                <div class="card-body">
                    <h5 class="card-title">TOTAL PERBAIKAN</h5>
                    <p class="card-text">10</p>
                    <a href="#" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
