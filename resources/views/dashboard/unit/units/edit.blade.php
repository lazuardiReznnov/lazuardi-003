@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Unit </h1>
</div>

<div class="row">
    <div class="col-lg-8">
        <form action="/dashboard/units/{{ $unit->slug }}" method="post" enctype="multipart/form-data">
          @method('put')
            @csrf
            <div class="mb-3">
              <label for="noReg" class="form-label">Reg Number</label>
              <input type="text" name="noReg" class="form-control @error('noReg') is-invalid @enderror" id="noReg" value="{{ old('noReg', $unit->noReg) }}" required autofocus>
              @error('noReg')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" value="{{ old('slug',$unit->slug) }} " readonly>
              @error('slug')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="type" class="form-label ">Type</label>
              <select class="form-select" id="type" name="type_id">
                <option value="" selected>--Select Type Unit--</option>
               @foreach($types as $type)
               @if(old('type_id',$unit->type_id)==$type->id)
                 <option value="{{ $type->id }}" selected>{{ $type->title }}</option>
               @endif
                   <option value="{{ $type->id }}">{{ $type->title }}</option>
               @endforeach
              </select>
            </div>
           
            <div class="mb-3">
              <label for="owner" class="form-label ">Owner</label>
              <select class="form-select" id="owner" name="owner_id">
                <option value="" selected>--Select Type Owener--</option>
               @foreach($owners as $owner)
               @if(old('owner_id',$unit->owner_id)== $owner->id)
                   <option value="{{ $owner->id }}" selected>{{ $owner->name }}</option>
               @endif
                   <option value="{{ $owner->id }}">{{ $owner->name }}</option>
               @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="brand" class="form-label ">Brand</label>
              <select class="form-select" id="brand" name="brand_id">
                <option value="" selected>--Select Brand Unit--</option>
               @foreach($brands as $brand)
               @if(old('brand_id',$unit->models->brand_id)==$brand->id)
                   <option value="{{ $brand->id }}" selected>{{ $brand->name }}</option>
                @endif   
                   <option value="{{ $brand->id }}">{{ $brand->name }}</option>
               @endforeach
              </select>
            </div>
            
            <div class="mb-3">
              <label for="Models" class="form-label ">Models</label>
              <select class="form-select" id="models" name="models_id">
                @if(old('models_id',$unit->models_id)== $unit->models_id)
                   <option value="{{ $unit->models_id }}" selected>{{ $unit->models->name }}</option>
               @endif
              </select>
            
            </div>
           
            <div class="mb-3">
              <label for="grup" class="form-label ">Grup</label>
              <select class="form-select" id="grup" name="grup_id">
                <option value="" selected>--Select Brand Unit--</option>
               @foreach($grups as $grup)
               @if(old('grup_id',$unit->grup_id)==$grup->id)
                   <option value="{{ $grup->id }}" selected>{{ $grup->name }}</option>
                @endif   
                   <option value="{{ $grup->id }}">{{ $grup->name }}</option>
               @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="vin" class="form-label">Vin</label>
              <input type="text" name="vin" class="form-control @error('vin') is-invalid @enderror" id="vin" value="{{ old('vin',$unit->vin) }}" required autofocus>
              @error('vin')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="engineNum" class="form-label">Engine Number</label>
              <input type="text" name="engineNum" class="form-control @error('engineNum') is-invalid @enderror" id="engineNum" value="{{ old('engineNum',$unit->engineNum) }}" required>
              @error('engineNum')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="year" class="form-label">Year</label>
              @php $now = date('Y'); @endphp
              <select name="year" class="form-select">
                <option selected>--Pilih Tahun</option>
              @for ($a=2012;$a<=$now;$a++)
              @if(old($a,$unit->year)==$a)
                <option value='{{ $a }}' selected>{{$a }} </option>
                @endif
                <option value='{{ $a }}'>{{$a }} </option>
              @endfor
              </select>
              @error('year')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="color" class="form-label">Color</label>
              <input type="text" name="color" class="form-control @error('color') is-invalid @enderror" id="color" value="{{ old('color',$unit->color) }}" required>
             
              @error('color')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            </div>

          <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            @if($unit->img)
            <input type="hidden" name="old_img" value="{{ $unit->img }}">
            <img src="{{ asset('storage/'. $unit->img) }}" class="d-block img-preview img-fluid mb-2 col-sm-5">
            @else
            <img class="img-preview img-fluid mb-2 col-sm-5">
            @endif
            <input class="form-control @error('img') is-invalid @enderror" type="file" id="image" name="img" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
          </div>
            <button type="submit" class="btn btn-primary">Update Unit</button>
          </form>
    </div>
</div>


<script type="text/javascript">
  // slug post
  //  slug alternatif`
  const noReg = document.querySelector("#noReg");
  const slug = document.querySelector("#slug");
  const link = "/dashboard/unit/checkSlug?noReg=";

  makeslug(noReg, slug, link);

  const brand = document.querySelector("#brand");
  const models = document.querySelector("#models");
  const link2 = "/dashboard/unit/getmodels?brand=";

  makeBrand(brand,models,link2);

</script>
@endsection