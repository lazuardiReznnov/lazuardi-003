@extends('dashboard.layouts.main') 
@section('container')
<div
    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
>
    <h1 class="h2">Update Status</h1>
</div>

<div class="row">
    <div class="col-lg-6">
        <form
            action="/dashboard/maintenance/{{$maintenance->id}}"
            method="post"
            enctype="multipart/form-data"
        >
            @csrf
            @method('put')

            
            
            <input type="hidden" name="maintenance_id" value="{{ $maintenance->id }}">
            <div class="mb-3">
                <label for="categori" class="form-label">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="" selected>--Select Status-</option>
                
                    @foreach($states as $stat)
                    
                     @if(old('$maintenance->status')==$stat['status'])
                    <option value="{{ $stat['status']}}" selected>
                        {{ $stat['desc'] }}
                    </option>
                    @endif
                    <option value="{{ $stat['status'] }}">{{ $stat['desc'] }}</option>
                    @endforeach
                </select>
            </div>


 
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div> 

@endsection

