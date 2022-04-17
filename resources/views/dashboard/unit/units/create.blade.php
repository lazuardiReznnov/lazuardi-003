@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Form Post </h1>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/units" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="title" class="form-label">Reg Number</label>
              <input type="text" name="noReg" class="form-control @error('noReg') is-invalid @enderror" id="noReg" value="{{ old('noReg') }}" required autofocus>
              @error('noReg')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug') }} " readonly>
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="type" class="form-label ">Type</label>
              <select class="form-select" id="type">
                <option value="" selected>--Select Type Unit--</option>
               @foreach($types as $type)
                   <option value="{{ $type->id }}">{{ $type->title }}</option>
               @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="owner" class="form-label ">Owner</label>
              <select class="form-select" id="owner">
                <option value="" selected>--Select Type Owener--</option>
               @foreach($owners as $owner)
                   <option value="{{ $owner->id }}">{{ $owner->name }}</option>
               @endforeach
              </select>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label ">Brand</label>
                <select class="form-select" id="brand">
                  <option value="" selected>--Select Brand Unit--</option>
                 @foreach($brands as $brand)
                     <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                 @endforeach
                </select>
              </div>

              <div class="mb-3">
                <label for="brand" class="form-label ">Models</label>
                <select class="form-select" id="models" name="models">
                
                </select>
              </div>
              
            <div class="mb-3">
              <label for="image" class="form-label">Upload Image</label>
              <img class="img-preview img-fluid mb-2 col-sm-5">
              <input class="form-control @error('image') is-invalid @enderror"" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
              <div class="invalid-feedback">
                 {{ $message }}
              </div>
            @enderror
            </div>
            <div class="mb-3">
              <label for="body" class="form-label">Body</label>
              @error('body')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="body" type="hidden" name="body" value="{{ old('body') }}">
              <trix-editor input="body"></trix-editor>

            </div>
           
            <button type="submit" class="btn btn-primary">Create Post</button>
          </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>


<script type="text/javascript">
// slug post
//  slug alternatif`
 const noReg = document.querySelector('#noReg')
const slug = document.querySelector('#slug')

// noReg.addEventListener('change', function () {
//   let preslug = noReg.value
//   preslug = preslug.replace(/ /g, '-')
//   slug.value = preslug.toLowerCase()
// });
noReg.addEventListener('change', function () {
  fetch('/dashboard/unit/checkSlug?noReg=' + noReg.value)
    .then((response) => response.json())
    .then((data) => (slug.value = data.slug))
});

 
$('#brand').change(function(){
    var brandID = $(this).val();    
    if(brandID){
        $.ajax({
           type:"GET",
           url:"/dashboard/unit/getmodels?brandID="+brandID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
              
                $("#models").empty();
                $("#models").append('<option>---Pilih Models---</option>');
                $.each(res,function(kode,models){
                    $("#models").append('<option value="'+kode+'">'+models.name+'</option>');
                });
            }else{
               $("#models").empty();
            }
           }
        });
    }else{
        $("#models").empty();
    }      
   });
</script>
@endsection