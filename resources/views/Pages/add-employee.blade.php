@extends("layouts.main")

@section('page-title')
@if (App::getLocale() == 'ar')
    إضافة موظف جديد - برنامج قادر
@else
    Hr-system
@endif
@endsection

@section('content')
<!----------- Dashboard (add-employee) ---------->
<div class="container-fluid">
<section id="horizontal-form-layouts">
<div class="row">
<div class="col-sm-12">
<h2 class="content-header">{{__('AddEmployee.Add_Employees_Form')}}</h2>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-header">
    <div class="card-title-wrap bar-success">
        <h4 class="card-title" id="horz-layout-basic">{{__('AddEmployee.Employee Information')}}</h4>
    </div>
    <p class="mb-0">{{__('AddEmployee.explain_page')}}</p>
</div>
<div class="card-body">
    <form action="{{route('store_employee')}}" class="form form-horizontal" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="px-3">
                <div class="form-body">
                    <h4 class="form-section">
                        <i class="icon-user"></i>{{__('AddEmployee.Personal Details')}}</h4>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput1">{{__('AddEmployee.First Name')}}</label>
                        <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" name="fname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput2">{{__('AddEmployee.Address')}}</label>
                        <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" name="address">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput3">{{__('AddEmployee.mail')}}</label>
                        <div class="col-md-9">
                            <input type="text" id="projectinput3" class="form-control" name="email">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput4">{{__('AddEmployee.CONTACT NUMBER')}}</label>
                        <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" name="phone">
                        </div>
                    </div>

                    <h4 class="form-section">
                        <i class="icon-book-open"></i>{{__('AddEmployee.Other Details')}}
                    </h4>
                    <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput9">{{__('AddEmployee.DATE BIRDTH')}}</label>
                        <div class="col-md-9">
                            <div class="position-relative has-icon-left">
                                <input type="date" id="timesheetinput3" class="form-control" name="date_birdth">
                                <div class="form-control-position">
                                <i class="ft-message-square"></i>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput9">{{__('AddEmployee.TYPE')}} </label>
            <div class="col-md-9">
                <input type="text" id="projectinput9" class="form-control" name="Type">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput10">{{__('AddEmployee.DATE OF CONTRACT')}} </label>
            <div class="col-md-9">
                <input type="text" id="projectinput10" class="form-control" name="Date_of_contract">
            </div>
        </div>
<div class="row">
    <div class="col-md-12">
                    <div class=" row form-group">
                        <label class="col-md-3 label-control">{{__('AddEmployee.START TIME')}}</label>
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
            <label class="col-md-3 label-control">{{__('AddEmployee.END TIME')}}</label>
            <div class="position-relative has-icon-left col-lg-9">
                <input type="time" id="timesheetinput6" class="form-control" name="endtime">
                <div class="form-control-position">
                    <i class="ft-clock"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 label-control" for="projectinput7">{{__('AddEmployee.SALARY')}}</label>
    <div class="col-md-9">
        <input type="text" class="form-control" name="salary"/>
    </div>
</div>

<div class="form-group row">
            <label class="col-md-3 label-control" for="projectinput11">{{__('AddEmployee.NATIONAL ID')}} </label>
            <div class="col-md-9">
                <input type="text" id="projectinput11" class="form-control" name="National_ID">
            </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control" for="projectinput12">{{__('AddEmployee.NATIONALITY')}} </label>
    <div class="col-md-9">
        <input type="text" id="projectinput12" class="form-control" name="Nationality">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 label-control">{{__('AddEmployee.select file')}} </label>
    <div class="col-md-9">
        <div class="mb-3">
            <label for="formFile" class="form-label">اختر ملف جديد</label>
            <input type="file" class="form-control" id="formFile" name="personal_img" multiple>
        </div>
    </div>
    </div>
    <div class="form-group row">
        <label class="col-md-3 label-control" for="projectinput9">{{__('AddEmployee.NOTES')}}</label>
        <div class="col-md-9">
            <textarea id="projectinput9" rows="5" class="form-control" name="comment"></textarea>
        </div>
    </div>
</div>

<div class="form-actions">
    <button type="button" class="btn btn-danger mr-1" id="cancel">
        <i class="icon-trash"></i> {{__('AddEmployee.cancel')}}
    </button>
    <button type="submit" class="btn btn-success">
        <i class="icon-note"></i> {{__('AddEmployee.save')}}
    </button>
</div>
        </form>
</div>

    </div>
</div>
</div>
</div>
</section>
</div>
<!----------- End Dashboard (add-employee) ---------->
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
    @endif
@endsection
