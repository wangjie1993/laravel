@extends('home.layouts.master')
@section('content')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">

    <!-- Libs CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/fonts/feather/feather.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/highlight/styles/vs2015.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/quill/dist/quill.core.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/flatpickr/dist/flatpickr.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('org/Dashkit-1.1.2/dist/assets')}}/css/theme.min.css">

    <title>Dashkit</title>
</head>
<body>

<!-- TOPNAV
================================================== -->

<!-- MAIN CONTENT
================================================== -->
<div class="main-content">

    <!-- HEADER -->
    <div class="header bg-dark pb-5">
        <div class="container">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle text-secondary">
                            Overview
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title text-white">
                            Performance
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Nav -->
                        <ul class="nav nav-tabs header-tabs">
                            <li class="nav-item" data-toggle="chart" data-target="#headerChart" data-update='{"data":{"datasets":[{"data":[0,10,5,15,10,20,15,25,20,30,25,40]}]}}' data-prefix="$" data-suffix="k">
                                <a href="#" class="nav-link text-center active" data-toggle="tab">
                                    <h6 class="header-pretitle text-secondary">
                                        Earnings
                                    </h6>
                                    <h3 class="text-white mb-0">
                                        $19.2k
                                    </h3>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="chart" data-target="#headerChart" data-update='{"data":{"datasets":[{"data":[50,75, 35,25,55,87,67,53,25,80,87,45]}]}}' data-prefix="" data-suffix="k">
                                <a href="#" class="nav-link text-center" data-toggle="tab">
                                    <h6 class="header-pretitle text-secondary">
                                        Sessions
                                    </h6>
                                    <h3 class="text-white mb-0">
                                        92.1k
                                    </h3>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="chart" data-target="#headerChart" data-update='{"data":{"datasets":[{"data":[40,57,25,50,57,32,46,28,59,34,52,48]}]}}' data-prefix="" data-suffix="%">
                                <a href="#" class="nav-link text-center" data-toggle="tab">
                                    <h6 class="header-pretitle text-secondary">
                                        Bounce
                                    </h6>
                                    <h3 class="text-white mb-0">
                                        50.2%
                                    </h3>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

            <!-- Footer -->
            <div class="header-footer">

                <!-- Chart -->
                <div class="chart">
                    <canvas id="headerChart" class="chart-canvas"></canvas>
                </div>

            </div>

        </div> <!-- / .container -->
    </div> <!-- / .header -->

    <!-- CARDS -->

</div> <!-- / .main-content -->

<!-- JAVASCRIPT
================================================== -->

<!-- Libs JS -->
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/chart.js/Chart.extension.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/highlight/highlight.pack.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/flatpickr/dist/flatpickr.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/list.js/dist/list.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/quill/dist/quill.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/dropzone/dist/min/dropzone.min.js"></script>
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/libs/select2/dist/js/select2.min.js"></script>

<!-- Theme JS -->
<script src="{{asset('org/Dashkit-1.1.2/dist/assets')}}/js/theme.min.js"></script>

</body>
</html>
@endsection