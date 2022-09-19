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
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h2 class="content-header"> Welcome in Pioneer-solutions Dashboard .. </h2>
                    <p class="content-sub-header">Statistics on minimal cards with background color.</p>
                </div>
            </div>
            <section id="basic-carousel">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-caption" data-slide-to="0" class=""></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="1" class=""></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="2" class="active"></li>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item">
                                        <img src="{{asset("assets/images/slide.PNG")}}" alt="First slide">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset("assets/images/slide2.PNG")}}" alt="Second slide">
                                    </div>
                                    <div class="carousel-item active">
                                        <img src="{{asset("assets/images/slide3.PNG")}}" alt="Third slide">
                                    </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel-example-caption" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel-example-caption" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Carousel end -->
            <div class="row match-height">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card bg-success" style="height: 171.672px;">
                        <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="row text-white">
                                <div class="col-6">
                                    <h1><i class="fa fa-usd background-round text-white p-2 font-medium-3"></i></h1>
                                    <h4 class="pt-1 m-0 text-white">123 <i class="fa fa-long-arrow-up"></i></h4>
                                </div>
                                <div class="col-6 text-right pl-0">
                                    <h4 class="text-white mb-2">Employees</h4>
                                    <span>90%</span>
                                    <br>
                                    <span>Grate</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card bg-danger" style="height: 171.672px;">
                        <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="row text-white">
                                <div class="col-6">
                                    <h1><i class="fa fa-star-o background-round text-white p-2 font-medium-3"></i></h1>
                                    <h4 class="pt-1 m-0 text-white">10 <i class="fa fa-long-arrow-down"></i></h4>
                                </div>
                                <div class="col-6 text-right pl-0">
                                    <h4 class="text-white mb-2">trainees</h4>
                                    <span>5%</span>
                                    <br>
                                    <span>Average</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card bg-info" style="height: 171.672px;">
                        <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="row text-white">
                                <div class="col-6">
                                    <h1><i class="fa fa-line-chart background-round text-white p-2 font-medium-3"></i></h1>
                                    <h4 class="pt-1 m-0 text-white">20% <i class="fa fa-long-arrow-up"></i></h4>
                                </div>
                                <div class="col-6 text-right pl-0">
                                    <h4 class="text-white mb-2">Attendance </h4>
                                    <span>60%</span>
                                    <br>
                                    <span>Good</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card bg-warning" style="height: 171.672px;">
                        <div class="card-body">
                        <div class="px-3 py-3">
                            <div class="row text-white">
                                <div class="col-6">
                                    <h1><i class="fa fa-rocket background-round text-white p-2 font-medium-3"></i></h1>
                                    <h4 class="pt-1 m-0 text-white">82% <i class="fa fa-long-arrow-up"></i></h4>
                                </div>
                                <div class="col-6 text-right pl-0">
                                    <h4 class="text-white">Referral</h4>
                                    <span>980</span>
                                    <br>
                                    <span>Grate</span>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Statistics cards Starts-->
        <div class="row match-height">
            <div class="col-12 col-md-8" id="recent-sales">
                <div class="card" style="height: 444.75px;">
                    <div class="card-header">
                        <div class="card-title-wrap bar-primary">
                        <h4 class="card-title">Recent Activites</h4>
                        </div>
                        <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                        </a>
                    </div>
                    <div class="card-content mt-1">
                        <div class="table-responsive">
                        <table class="table table-hover table-xl mb-0" id="recent-orders">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Emplyee id </th>
                                    <th class="border-top-0">Employee Name </th>
                                    <th class="border-top-0">Date </th>
                                    <th class="border-top-0">Attendance date</th>
                                    <th class="border-top-0">check-out date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                    <button class="btn btn-sm btn-outline-danger round mb-0" type="button">#695</button>
                                    </td>
                                    <td class="text-truncate">Tasneem saleh </td>
                                    <td class="text-truncate">1-11-2021</td>
                                    <td class="text-truncate">9 am </td>
                                    <td class="text-truncate">5 pm </td>
                                </tr>
                                <tr>
                                    <td>
                                    <button class="btn btn-sm btn-outline-success round mb-0" type="button">#9985</button>
                                    </td>
                                    <td class="text-truncate">Mohamed ali</td>
                                    <td class="text-truncate">1-11-2021</td>
                                    <td class="text-truncate">10 am </td>
                                    <td class="text-truncate">5 pm</td>
                                </tr>
                                <tr>
                                    <td>
                                    <button class="btn btn-sm btn-outline-danger round mb-0" type="button">#1111</button>
                                    </td>
                                    <td class="text-truncate">Eman ahmed</td>
                                    <td class="text-truncate">1-11-2021</td>
                                    <td class="text-truncate">9 am </td>
                                    <td class="text-truncate">5 pm </td>
                                </tr>
                                <tr>
                                    <td>
                                    <button class="btn btn-sm btn-outline-success round mb-0" type="button">#050</button>
                                    </td>
                                    <td class="text-truncate">ahmed mohamed</td>
                                    <td class="text-truncate">1-11-2021</td>
                                    <td class="text-truncate">9 am </td>
                                    <td class="text-truncate">5 pm </td>
                                </tr>
                                <tr>
                                    <td>
                                    <button class="btn btn-sm btn-outline-danger round mb-0" type="button">#9333</button>
                                    </td>
                                    <td class="text-truncate">Reem Mohamed</td>
                                    <td class="text-truncate">1-11-2021</td>
                                    <td class="text-truncate">9 am </td>
                                    <td class="text-truncate">5 pm </td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-12">
                <div class="card" style="height: 444.75px;">
                    <div class="card-header">
                        <div class="card-title-wrap bar-warning">
                        <h4 class="card-title">Statistics</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="font-medium-2 text-muted text-center pb-2">Last 24 hours</p>
                        <div id="Stack-bar-chart" class="height-300 Stackbarchart mb-2">
                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"><line y1="240" y2="240" x1="30" x2="239.65625" class="ct-grid ct-vertical"></line><line y1="205" y2="205" x1="30" x2="239.65625" class="ct-grid ct-vertical"></line><line y1="170" y2="170" x1="30" x2="239.65625" class="ct-grid ct-vertical"></line><line y1="135" y2="135" x1="30" x2="239.65625" class="ct-grid ct-vertical"></line><line y1="100" y2="100" x1="30" x2="239.65625" class="ct-grid ct-vertical"></line><line y1="65" y2="65" x1="30" x2="239.65625" class="ct-grid ct-vertical"></line><line y1="30" y2="30" x1="30" x2="239.65625" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><line x1="38.73667708333333" x2="38.735677083333336" y1="135" y2="37" class="ct-bar" ct:value="7" style="stroke-width: 5px"></line><circle cx="38.735677083333336" cy="37" r="5" class="ct-slice-bar"></circle><line x1="56.208031250000005" x2="56.20703125000001" y1="135" y2="79" class="ct-bar" ct:value="4" style="stroke-width: 5px"></line><circle cx="56.20703125000001" cy="79" r="5" class="ct-slice-bar"></circle><line x1="73.67938541666668" x2="73.67838541666667" y1="135" y2="107" class="ct-bar" ct:value="2" style="stroke-width: 5px"></line><circle cx="73.67838541666667" cy="107" r="5" class="ct-slice-bar"></circle><line x1="91.15073958333333" x2="91.14973958333333" y1="135" y2="163" class="ct-bar" ct:value="-2" style="stroke-width: 5px"></line><circle cx="91.14973958333333" cy="163" r="5" class="ct-slice-bar"></circle><line x1="108.62209375" x2="108.62109375" y1="135" y2="191" class="ct-bar" ct:value="-4" style="stroke-width: 5px"></line><circle cx="108.62109375" cy="191" r="5" class="ct-slice-bar"></circle><line x1="126.09344791666668" x2="126.09244791666667" y1="135" y2="233" class="ct-bar" ct:value="-7" style="stroke-width: 5px"></line><circle cx="126.09244791666667" cy="233" r="5" class="ct-slice-bar"></circle><line x1="143.56480208333335" x2="143.56380208333334" y1="135" y2="233" class="ct-bar" ct:value="-7" style="stroke-width: 5px"></line><circle cx="143.56380208333334" cy="233" r="5" class="ct-slice-bar"></circle><line x1="161.03615625000003" x2="161.03515625000003" y1="135" y2="191" class="ct-bar" ct:value="-4" style="stroke-width: 5px"></line><circle cx="161.03515625000003" cy="191" r="5" class="ct-slice-bar"></circle><line x1="178.5075104166667" x2="178.50651041666669" y1="135" y2="163" class="ct-bar" ct:value="-2" style="stroke-width: 5px"></line><circle cx="178.50651041666669" cy="163" r="5" class="ct-slice-bar"></circle><line x1="195.97886458333335" x2="195.97786458333334" y1="135" y2="107" class="ct-bar" ct:value="2" style="stroke-width: 5px"></line><circle cx="195.97786458333334" cy="107" r="5" class="ct-slice-bar"></circle><line x1="213.45021875000003" x2="213.44921875000003" y1="135" y2="79" class="ct-bar" ct:value="4" style="stroke-width: 5px"></line><circle cx="213.44921875000003" cy="79" r="5" class="ct-slice-bar"></circle><line x1="230.9215729166667" x2="230.92057291666669" y1="135" y2="37" class="ct-bar" ct:value="7" style="stroke-width: 5px"></line><circle cx="230.92057291666669" cy="37" r="5" class="ct-slice-bar"></circle></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="30" y="270" width="17.471354166666668" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="47.47135416666667" y="270" width="17.471354166666668" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">F</span></foreignObject><foreignObject style="overflow: visible;" x="64.94270833333334" y="270" width="17.471354166666664" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="82.4140625" y="270" width="17.47135416666667" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="99.88541666666667" y="270" width="17.47135416666667" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="117.35677083333334" y="270" width="17.471354166666657" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="134.828125" y="270" width="17.47135416666667" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="152.29947916666669" y="270" width="17.47135416666667" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="169.77083333333334" y="270" width="17.471354166666657" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" x="187.2421875" y="270" width="17.471354166666686" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">O</span></foreignObject><foreignObject style="overflow: visible;" x="204.71354166666669" y="270" width="17.471354166666657" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 17px; height: 20px;">N</span></foreignObject><foreignObject style="overflow: visible;" x="222.18489583333334" y="270" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">D</span></foreignObject></g><defs><linearGradient id="StackbarGradient" x1="0" y1="1" x2="0" y2="0"><stop offset="0" stop-color="rgba(0, 201, 255,1)"></stop><stop offset="1" stop-color="rgba(17,228,183, 1)"></stop></linearGradient></defs></svg></div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-------------  End Dashboard (Add Employer) --------------->
@endsection
