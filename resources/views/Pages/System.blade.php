@extends('layouts.main')

@section('page-title')
Hr System
@endsection

@section('content')
<div class="container-fluid">
<section id="horizontal-form-layouts">
<div class="row">
<div class="col-md-12">
<div class="card">
    <div class="card-header">
        <div class="card-title-wrap bar-success">
            <h4 class="card-title" id="horz-layout-basic">General Settings Form </h4>
        </div>
        <p class="mb-0">On this page you adjust the entire system settings.</p>
    </div>
    <div class="card-body">
        <div class="px-3">
            <form class="form form-horizontal" action="{{route('system.store')}}" method="POST">
                @csrf
                <div class="form-body">
                    <h4 class="form-section">
                        <i class="icon-user"></i>General information</h4>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1">Group Name: </label>
                        <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" name="Group_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1">hour price: </label>
                        <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" name="extra">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput7">Weekly Holidays: </label>
                        <div class="col-md-9">
                            <input type="checkbox" value="Satrday" name="holdays[]">
                            <label for="sat"> Satrday</label><br>
                            <input type="checkbox" value="Sunday" name="holdays[]">
                            <label for="sun"> Sunday</label><br>
                            <input type="checkbox" value="Monday" name="holdays[]">
                            <label for="mon"> Monday</label><br>
                            <input type="checkbox" value="Tuesday" name="holdays[]">
                            <label for="sun"> Tuesday</label><br>
                            <input type="checkbox" value="Turthday" name="holdays[]">
                            <label for="sun"> Turthday</label><br>
                            <input type="checkbox" value="Friday" name="holdays[]">
                            <label for="Fri">Friday</label><br>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="button" class="btn btn-danger mr-1" id="cancel">
                            <i class="icon-trash"></i> Cancel
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="icon-note"></i> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</section>
</div>
@endsection

@section('js')
<script>
    $("#cancel").on('click', function(){
        $(":input", ".form").not(':button, :submit, :reset, :hidden').val('');
    })
</script>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            $(function(){
                toastr["error"]("{{ $error }}")
            });
        </script>
    @endforeach
@endif

@if(Session::has('success'))
<script>
$(function(){
toastr.options = {
"closeButton": true,
"debug": false,
"newestOnTop": false,
"progressBar": true,
"positionClass": "toast-top-right",
"preventDuplicates": false,
"onclick": null,
"showDuration": "300",
"hideDuration": "1000",
"timeOut": "5000",
"extendedTimeOut": "1000",
"showEasing": "swing",
"hideEasing": "linear",
"showMethod": "fadeIn",
"hideMethod": "fadeOut"
}
toastr.success('{{ Session::get('success') }}');
});
</script>
@endif
@endsection
