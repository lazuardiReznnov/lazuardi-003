<!-- Bootstrap core CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    @page {
      size: A4;
    }
    
    table.text th td{
        border: none;
    }
     table.text {
        width: auto;
        margin-left: 50px;
    }
   
</style>
<div class="container fluid p-4">
<div class="card">
    <div class="card-body">
        <div class="row ">
          
            <div class="col-md">
                <h1 class="text-center">Surat Perintah Kerja</h1>
            </div>
            
        </div>
       
        <div class="row">
            <div class="col-md">
               
                <div class="table-responsive mt-5">
                    <table class="table text ">
                        <tr>
                            <th>Tanggal</th>
                            <td>:</td>
                            <td>  {{ \Carbon\Carbon::parse($maintenance->date)->format('d/m/Y') }}</td>
                        </tr>
                        <tr>
                            <th>Unit</th>
                            <td>:</td>
                            <td>   {{ $maintenance->unit->noReg }}</td>
                        </tr>
                        <tr>
                            <th>Problem</th>
                            <td>:</td>
                            <td>  {{ $maintenance->problem}}</td>
                        </tr>
                        <tr>
                            <th>Repair</th>
                            <td>:</td>
                            <td>  {{ $maintenance->analysis}}</td>
                        </tr>
                        <tr>
                            <th>Mechanic</th>
                            <td>:</td>
                            <td>  {{ $maintenance->mechanic}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>