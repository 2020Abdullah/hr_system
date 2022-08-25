@extends('layouts.main')

@section('page-title')
Hr System
@endsection

@section('content')
<div class="container-fluid">
<section id="configuration">
<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<div class="card-title-wrap bar-success">
    <h4 class="card-title">Salary report</h4>
</div>
</div>
<div class="card-body collapse show">
<div class="card-block card-dashboard">
    <p class="card-text">DataTables has most features enabled by default,
        so all you need to do to use it with your own ables is to call the construction</p>

        <div class="row"><div class="col-sm-12 col-md-3"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Year
            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm">
                <option value="10">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="2000">
                    2000</option></select> </label></div></div>

                    <div class="col-sm-12 col-md-3"><div class="dataTables_length" id="DataTables_Table_0_length"><label>Month
                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-control form-control-sm">
                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">
                        3</option></select> </label></div></div>

            <div class="col-lg-3"><button id="addRow" class="btn btn-primary mb-2"> <i class="ft-search"></i>&nbsp;
                <a>  Search Employee</a></button></div>
        </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered zero-configuration mt-40 example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Employee Name</th>
                    <th>Phone</th>
                    <th>Salary</th>
                    <th>Attendance days</th>
                    <th>Absent days</th>
                    <th>Hour price</th>
                    <th>Overtime hours</th>
                    <th>discount hours</th>
                    <th>total hours</th>
                    <th>discount</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($All_reports as $report)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$report->fname}}</td>
                        <td>{{$report->phone}}</td>
                        <td>{{$report->salary}}</td>
                        <td>{{$report->total_Attendance_days}}</td>
                        <td>{{$report->total_Absent_days}}</td>
                        <td>{{$report->hour_price}}</td>
                        @if ($report->total_hours_overtime >= 0)
                            <td>{{$report->total_hours_overtime}}</td>
                        @else
                            0
                        @endif
                        <td>
                        @if ($report->total_hours_overtime < 0)
                            <td>{{- $report->total_hours_overtime}}</td>
                        @else
                            0
                        @endif
                        </td>
                        <td>{{$report->total_hours}}</td>
                        <td>{{$report->discount_total}}</td>
                        <td>{{$report->total}}</td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="13">No Reports Yet</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
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
    $(function(){
        var table = $('.example').DataTable();
        table.column( 3 ).data().sum();
    });
</script>
@endsection
