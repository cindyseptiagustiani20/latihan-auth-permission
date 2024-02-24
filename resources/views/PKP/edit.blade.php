@extends('layouts.master')
@section('title', 'Edit Data PKP')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data PKP</h4>
                    <form action="{{route('PKP.update')}}" method="POST" class="forms-sample">
                        @csrf
                        <input type="hidden" name="id" value="{{$PKP->id}}" required>
                        
                        <div class="form-group">
                            <label for="exampleInputjabatanname1">Minimal Gaji</label>
                            <input required type="text" class="form-control number" id="exampleInputjabatanname1" placeholder="Minimal Gaji" value="{{$PKP->min}}" name="min">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Maksimal Gaji</label>
                            <input required type="text" class="form-control number" id="exampleInputPassword1" placeholder="Maksimal Gaji" name="max" value="{{$PKP->max}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Persen</label>
                            <input required type="text" class="form-control" id="besar" placeholder="Maksimal Gaji" name="persen" value="{{$PKP->persen}}">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('PKP')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('script')
    <script>
    $('body').on("input keydown keyup mousedown mouseup select contextmenu drop", '#besar', function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
        var value = $(this).val();

        if ((value !== '') && (value.indexOf('.') === -1)) {

            $(this).val(Math.max(Math.min(value, 100), -100));
        }
    });

    $('body').on("input keydown keyup mousedown mouseup select contextmenu drop", '.number', function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
</script>
    @endsection