<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/css/lazuardi-003.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&family=Poppins:ital,wght@0,400;0,700;1,100&family=Roboto:wght@300;400;700&family=Sansita+Swashed:wght@300;600&display=swap"
      rel="stylesheet"
    />

    <title>Maintenance | SPK</title>
  </head>
  <body>

    <div class="container">
      <div class="card mt-3">
        <div class="card-body">
          <header class="row border-bottom align-items-center mb-4">
            <div class="col-2 p-2">
              <img src="/img/logo.png" width="100px">
            </div>
            <div class="col-10">
              <h1 class="text-center">WORK ORDER</h1>
            </div>
          </header>
          <section class="row">
            <div class="col">
              <dl class="row">
                <dt class="col-2">Date</dt>
                <dd class="col-9">: {{ \Carbon\Carbon::parse($maintenance->date)->format('d F Y') }}</dd>
                <dt class="col-2">Unit</dt>
                <dd class="col-9">: {{ $maintenance->unit->noReg }}</dd>
                <dt class="col-2">Merk/Model</dt>
                <dd class="col-9">: {{ $maintenance->unit->models->brand->name." ".$maintenance->unit->models->name }}</dd>
                <dt class="col-2">Type</dt>
                <dd class="col-9">: {{ $maintenance->unit->type->title }}</dd>
                <dt class="col-2">Problem</dt>
                <dd class="col-9">: {{$maintenance->problem}}</dd>
                <dt class="col-2">Diagnose</dt>
                <dd class="col-9">: {{$maintenance->analysis}}</dd>
              </dl>
            </div>
          </section>
          <row class="row">
            <div class="col">
              <p>Tangerang,  {{ \Carbon\Carbon::parse($maintenance->date)->format('d F Y') }}</p>
            </div>
          </row>
          <div class="row mt-5">
            <div class="col">
              
              (.....................................)
            <br> <span class="fw-bold">ADMINISTRATOR</span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
