@extends('layouts.main')

@section('page-title')
@if (App::getLocale() == 'ar')
    التقارير اليومية للموظفين - برنامج قادر
@else
    employees reports
@endif
@endsection

@section('content')

<div class="container-fluid">
    <section id="configuration">
    <div class="row">
    <div class="col-12">
    <div class="card">
    <div class="card-header">
    <div class="card-title-wrap bar-success">
        <h4 class="card-title">{{__('Salary_report.Salary_report')}}</h4>
    </div>
    </div>
    <div class="card-body collapse show">
    <div class="card-block card-dashboard">
        <p class="card-text">
            {{__('Salary_report.page_desc')}}
        </p>
        <form method="POST" action="{{route('Reports.search')}}">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label class="form-label">بحث بالتاريخ</label>
                        <input type="date" class="form-control" name="search_date"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dataTables_length" id="DataTables_Table_0_length">
                        <label class="form-label">بحث بالإسم أو بالكود</label>
                        <input type="text" class="form-control" name="search_target"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary mt-4">
                        <i class="ft-search"></i>&nbsp;
                        <a>{{__('Salary_report.Search Employee')}}</a>
                    </button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-bordered zero-configuration mt-40">
                <thead>
                    <tr>
                        <th>{{ __('Salary_report.id') }}</th>
                        <th>{{ __('Salary_report.Employee Name') }}</th>
                        <th>{{ __('Salary_report.report num') }}</th>
                        <th>{{ __('Salary_report.report date') }}</th>
                        <th>{{ __('Salary_report.state') }}</th>
                        <th>{{ __('Salary_report.Hour price') }}</th>
                        <th>{{ __('Salary_report.total Hours') }}</th>
                        <th>{{ __('Salary_report.Overtime hours') }}</th>
                        <th>{{ __('Salary_report.hours_overtim_price') }}</th>
                        <th>{{ __('Salary_report.discount day') }}</th>
                        <th>{{ __('Salary_report.total') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($All_reports as $report)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$report->employee->fname}}</td>
                            <td>{{$report->report_num}}</td>
                            <td>{{$report->report_date}}</td>
                            @if ($report->employee->total_Attendance_days > 0)
                                <td>{{__('Salary_report.Attendance')}}</td>
                            @else
                                <td>{{__('Salary_report.absent')}}</td>
                            @endif
                            <td>{{$report->hour_price}}</td>
                            <td>{{ $report->total_hours_overtime }}</td>
                            @if ($report->total_hours_overtime - $report->total_hours < 0)
                                <td>0</td>
                            @else
                                <td>{{$report->total_hours_overtime - $report->total_hours}}</td>
                            @endif
                            @if ($report->hour_price *  ($report->total_hours_overtime - $report->total_hours) > 0)
                                <td>{{ $report->hour_price *  ($report->total_hours_overtime - $report->total_hours) * 2}}</td>
                            @else
                                <td>{{ $report->hour_price *  ($report->total_hours_overtime - $report->total_hours)}}</td>
                            @endif
                            <td>{{$report->total_disconut}}</td>
                            @if ($report->hour_price *  ($report->total_hours_overtime - $report->total_hours) > 0)
                                <td>{{ ($report->hour_price * $report->total_hours) + $report->hour_price *  ($report->total_hours_overtime - $report->total_hours) * 2 - ($report->total_disconut)}}</td>
                            @else
                                <td>{{ ($report->hour_price * $report->total_hours) + $report->hour_price *  ($report->total_hours_overtime - $report->total_hours) - ($report->total_disconut)}}</td>
                            @endif
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="13">{{__('Salary_report.No Reports')}}</td>
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
    $('.example').DataTable();
});
</script>
@endsection
