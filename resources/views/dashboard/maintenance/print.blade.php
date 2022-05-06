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
    <div class="container-fluid">
      <div class="card">
       <div class="card-body">
       
          <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            
              <span class="fs-4">Work Order</span>
            
            </header>
          </div>

            <div class="container">
              <div class="row p-2 mt-4">
                <div class="col-2 head">
                  Date
                </div>
                <div class="col-8">
                  : {{ \Carbon\Carbon::parse($maintenance->date)->format('d F Y') }}
                </div>
              </div>
              <div class="row p-2">
                <div class="col-2 head">
                  Unit
                </div>
                <div class="col-8">
                  : {{ $maintenance->unit->noReg }}
                </div>
              </div>

              <div class="row p-2">
                <div class="col-2 head">
                  Problem
                </div>
                <div class="col-8">
                  : {{$maintenance->problem}}
                </div>
              </div>
              <div class="row p-2">
                <div class="col-2 head">
                  Desc Repair
                </div>
                <div class="col-8">
                  : {{$maintenance->analysis}}
                </div>
              </div> 
            <div class="row justify-content-end col">
            <div class="col-4">
            <p>Serang, {{ \Carbon\Carbon::parse($maintenance->date)->format(' d F Y') }}</p>
            </div>
            </div>
                <div class="row justify-content-between mt-4">
                  <div class="col-md-4">
                  
                    <p class="t-sign">
                      (..........................)
                      <br />
                      Mechanic
                    </p>
                  </div>
                  <div class="col-md-4">
                    <p class="t-sign">
                      (..........................)
                      <br />
                      Administrator
                    </p>
                  </div>
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
