@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">FORM INPUT TYPE</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form action="/dashboard/unit/types" method="post">
          @csrf
            <div class="mb-3">
              <label for="title" class="form-label">title</label>
              <input type="title" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
              @error('title')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">slug</label>
                <input type="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                @enderror
              </div>
            <button type="submit" class="btn btn-primary">SAVE</button>
          </form>
    </div>
</div>
<script>
    // slug post
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    
    title.addEventListener('change', function () {
      fetch('/dashboard/unit/types/checkSlug?title=' + title.value)
        .then((response) => response.json())
        .then((data) => (slug.value = data.slug))
    });
    </script>

@endsection