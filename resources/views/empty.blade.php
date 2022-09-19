@extends('layouts.main')

@section('page-title')
@if (App::getLocale() == 'ar')
    برنامج قادر المحاسبي
@else
    POS System
@endif
@endsection


@section('content')
<!-------------  Dashboard (Add Employer) --------------->
<div class="container-fluid">
    <section id="minimal-statistics-bg">
        <x-empty-page />
    </section>
</div>
<!-------------  End Dashboard (Add Employer) --------------->
@endsection
