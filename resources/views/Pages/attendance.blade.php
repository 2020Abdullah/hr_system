@extends('layouts.main')

@section('page-title')
@if (App::getLocale() == 'ar')
    سجل الحضور والإنصراف - برنامج قادر
@else
    Attendance and departure
@endif
@endsection

@section('content')
<!----------- Dashboard (Attendance and departure) ---------->
<div class="container-fluid">
<section id="configuration">
<div class="row">
<div class="col-lg-12">
<div class="card">
<div class="card-header">
    <div class="card-title-wrap bar-success">
        <h4 class="card-title">{{__('Attendance.Attendance_departure')}}</h4>
    </div>
</div>
<div class="card-body collapse show">
    <div class="card-block card-dashboard">
        <p class="card-text">
            {{__('Attendance.page_desc')}}
        </p>
        <table class="table table-striped table-bordered zero-configuration mt-40 example">
            <thead>
                <tr>
                    <th>{{__('Attendance.Name')}}</th>
                    <th>{{__('Attendance.Date')}}</th>
                    <th>{{__('Attendance.Attendance_date')}}</th>
                    <th>{{__('Attendance.check_out_date')}}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($attendance as $att)
                    <tr>
                        <td>{{$att->fname}}</td>
                        <td>{{$att->date}}</td>
                        <td>{{ date("h:i a", strtotime($att->attendance_time)) }}</td>
                        @if ($att->departure_time === null)
                            <td>----</td>
                        @else
                            <td>{{ date("h:i a", strtotime($att->departure_time)) }}</td>
                        @endif
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="6">{{__('Attendance.No attendance yet')}}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="card-header">
    <div class="card-title-wrap bar-success">
        <h4 class="card-title">{{__('Attendance.absence request')}}</h4>
    </div>
</div>
<div class="card-body collapse show">
    <div class="card-block card-dashboard">
        <table class="table table-striped table-bordered zero-configuration mt-40 example">
            <thead>
                <tr>
                    <th>{{__('Attendance.Name')}}</th>
                    <th>{{__('Attendance.absence date')}}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($abasent as $aba)
                    <tr>
                        <td>{{$aba->fname}}</td>
                        <td>{{$aba->absence_date}}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="4">{{__('Attendance.No absence yet')}}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<div class="card-header">
    <div class="card-title-wrap bar-success">
        <h4 class="card-title">{{__('Attendance.Request A Form')}}</h4>
    </div>
</div>
<div class="card-body">
<div class="px-3">
    <form class="form form-horizontal" action="{{route('Attendance.store')}}" method="POST">
    @csrf
    <div class="form-body">
        <div class="form-group row">
            <label class="col-md-3 label-control" for="employ_name">{{__('Attendance.EMPLOYEE NAME')}}</label>
            <div class="col-md-9">
                <select id="employ_name" name="fcode" class="form-control">
                <option value="">...</option>
                @foreach ($employes as $employ)
                    <option value="{{$employ->id}}">{{$employ->fname}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="Group_name">{{__('Attendance.GROUP')}}</label>
            <div class="col-md-9">
                <select id="employ_group" name="group_id" class="form-control">
                    <option value="">...</option>
                    @foreach ($groups as $group)
                        <option value="{{$group->id}}">{{$group->Group_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput9">{{__('Attendance.DATE')}} </label>
            <div class="col-md-9">
            <div class="position-relative has-icon-left">
                <input type="date" id="timesheetinput3" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>">
                <div class="form-control-position">
                <i class="ft-message-square"></i>
                </div>
            </div>
            </div>
            </div>
        </div>
        <div class=" row">
        <div class="col-md-12">
            <div class=" row form-group">
            <label class="col-md-3 label-control">{{__('Attendance.START TIME')}}</label>
            <div class="position-relative has-icon-left col-lg-9">
                <input type="time" id="timesheetinput5" class="form-control" name="starttime">
                <div class="form-control-position">
                <i class="ft-clock"></i>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class=" row form-group">
            <label class="col-md-3 label-control">{{__('Attendance.END TIME')}}</label>
            <div class="position-relative has-icon-left col-lg-9">
                <input type="time" id="timesheetinput6" class="form-control" name="endtime">
                <div class="form-control-position">
                <i class="ft-clock"></i>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class=" row form-group">
            <label class="col-md-3 label-control">{{__('Attendance.ABSENT')}}</label>
            <div class="position-relative has-icon-left col-lg-9">
                <input type="checkbox" id="Absent" value="1" name="Absent">
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="form-actions">
        <button type="button" class="btn btn-danger mr-1" id="cancel">
        <i class="icon-trash"></i> {{__('Attendance.cancel')}}
        </button>
        <button type="submit" class="btn btn-success">
        <i class="icon-note"></i> {{__('Attendance.save')}}
        </button>
    </div>
    </form>
</div>
</div>
</div>
</section>
</div>
<!----------- End Dashboard (Attendance and departure) ---------->
@endsection

@section('js')
<script>
    $(function(){
        $('.example').DataTable();
    });

    $("#cancel").on('click', function(){
            $(":input", ".form").not(':button, :submit, :reset, :hidden').val('');
    })
</script>

@if ($errors->any())
    @foreach ($errors->all() as $error)
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
                toastr["error"]("{{ $error }}")
            });
        </script>
    @endforeach
@endif

@if($message = Session::get('success'))
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
            toastr["success"]("{{ $message }}")
        });
    </script>
@elseif ($message = Session::get('error'))
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
            toastr["error"]("{{ $message }}")
        });
    </script>
@endif
@endsection

