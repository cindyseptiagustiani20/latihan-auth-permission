@extends('layouts.master')
@section('title', 'Tambah Data Potongan')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Data Potongan</h4>
                    <form action="{{route('potongan.insert')}}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputPotonganname1">Nama Potongan</label>
                            <input required type="text" class="form-control" id="exampleInputPotonganname1" placeholder="Nama Potongan" name="nama_potongan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis</label>
                            <select required class="form-control" id="jenis" name="jenis">
                                <option value="persen">Persen</option>
                                <option value="rupiah">Rupiah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Besar Potongan</label>
                            <input id="besar" required type="text" class="form-control" id="exampleInputPassword1" placeholder="Besar Potongan" name="besar">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                        <a href="{{route('potongan')}}" class="btn btn-light">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        console.log('test');
        $('body').on('change', '#jenis', function() {
            if ($(this).val() == 'persen') {
                $('#besar').attr('max', '100');
                if ($('#besar').val() > 100) {
                    $('#besar').val(100);
                }
            } else {
                $('#besar').removeAttr('max');
                $('#besar').unbind('input');
            }
        });
    });

    $('body').on("input keydown keyup mousedown mouseup select contextmenu drop", '#besar', function() {
        this.value = this.value.replace(/[^0-9\.]/g, '');
        if ($('#jenis').val() == 'persen') {
            var value = $(this).val();

            if ((value !== '') && (value.indexOf('.') === -1)) {

                $(this).val(Math.max(Math.min(value, 100), -100));
            }
        }
    });
</script>
@endsection