@extends('admin.layout' , ['title' => __('Dashboard')])

@section('content')
    <div class="row gy-5 g-xl-8">

        {{-- Users --}}
        <div class="col-xl-3">
            <div class="card bg-success card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="fas fa-user display-2 text-white"></i>
                    </div>
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">{{__('Users')}}</div>
                    <div
                        class="fw-bold text-inverse-success  d-flex justify-content-center align-items-center  counter counter-success">{{$count['users']}}</div>
                </div>
            </div>
        </div>

        {{-- Teacher Downloads--}}
        <div class="col-xl-3">
            <div class="card bg-danger card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="fas fa-download display-2 text-white"></i>
                    </div>
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">{{__('Teacher Downloads')}}</div>
                    <div
                        class="fw-bold text-inverse-success  d-flex justify-content-center align-items-center  counter counter-danger">{{$count['downloads']['teacher']}}</div>
                </div>
            </div>
        </div>

        {{-- Student Downloads --}}
        <div class="col-xl-3">
            <div class="card bg-primary card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="fas fa-download display-2 text-white"></i>
                    </div>
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">{{__('Student Downloads')}}</div>
                    <div
                        class="fw-bold text-inverse-success  d-flex justify-content-center align-items-center  counter counter-primary">{{$count['downloads']['student']}}</div>
                </div>
            </div>
        </div>

        {{-- Questions --}}
        <div class="col-xl-3">
            <div class="card bg-warning card-xl-stretch mb-5 mb-xl-8">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                        <i class="fas fa-question display-2 text-white"></i>
                    </div>
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5">{{__('Questions')}}</div>
                    <div
                        class="fw-bold text-inverse-success d-flex justify-content-center align-items-center  counter counter-warning">{{$count['questions']}}</div>
                </div>
            </div>
        </div>

        {{-- all_page_visits --}}
        <div class="col-xl-3">
            <div class="card bg-white card-xl-stretch mb-5 mb-xl-8 custom-box-shadow">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5 text-dark">عدد الزيارات الكلية</div>
                    <div
                        class="fw-bold  d-flex justify-content-center align-items-center  counter text-primary">{{$all_page_visits}}</div>
                </div>
            </div>
        </div>

        {{-- last Year visits  --}}
        <div class="col-xl-3">
            <div class="card bg-white card-xl-stretch mb-5 mb-xl-8 custom-box-shadow">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5 text-dark">عدد الزيارات لآخر 365 يومًا
                    </div>
                    <div
                        class="fw-bold  d-flex justify-content-center align-items-center  counter text-primary">{{$last_year_visits}}</div>
                </div>
            </div>
        </div>

        {{-- last Month visits  --}}
        <div class="col-xl-3">
            <div class="card bg-white card-xl-stretch mb-5 mb-xl-8 custom-box-shadow">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5 text-dark">عدد الزيارات لآخر 30 يومًا
                    </div>
                    <div
                        class="fw-bold  d-flex justify-content-center align-items-center  counter text-primary">{{$last_month_visits}}</div>
                </div>
            </div>
        </div>


        {{-- all_page_visits --}}
        <div class="col-xl-3">
            <div class="card bg-white card-xl-stretch mb-5 mb-xl-8 custom-box-shadow">
                <div class="card-body d-flex align-items-center flex-column">
                    <div class="text-inverse-success fw-bolder fs-2 mb-2 mt-5 text-dark">الزوار الجدد لآخر 7 أيّام</div>
                    <div
                        class="fw-bold  d-flex justify-content-center align-items-center  counter text-primary">{{$new_visitors}}</div>
                </div>
            </div>
        </div>

        <div class="row">
            @if($pages_views && !empty($pages_views))
                <div class="col-lg-6 d-flex align-items-stretch">
                    <div class="card" style="width: 100%">

                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3">الزيارات لآخر 7 أيّام</span>
                            </h3>
                        </div>

                        <div id="faz-chart-days-visitors" class="chart"></div>
                    </div>
                </div>
            @endif

            @if($most_visited_pages && !empty($most_visited_pages))
                <div class="col-lg-6">
                    <div class="card">

                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3">أكثر الصفحات زيارةً لآخر 30 يومًا</span>
                            </h3>
                        </div>

                        <div id="faz-chart-most-visited-pages" class="chart"></div>
                    </div>
                </div>
            @endif

        </div>

        <div class="col-12">
            <div class="card card-xxl-stretch mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">{{__('Users Leadership')}}</span>
                    </h3>
                </div>

                <div class="card-body py-3">
                    <div class="table-responsive">

                        <table
                            class="table table-borderless table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">

                            <thead>
                            <tr class="fw-bolder text-muted">
                                <th class="min-w-150px">{{__('User')}}</th>
                                <th class="min-w-140px">{{__('Number of pass queries')}}</th>
                                <th class="min-w-140px">{{__('Number of fail queries')}}</th>
                                <th class="min-w-100px">
                                    {{__('Progress Rate')}}
                                </th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="symbol symbol-45px me-5">
                                                <img src="{{$user->thumbnail_url}}" alt=""/>
                                            </div>
                                            <div class="d-flex justify-content-start flex-column">
                                                <a class="text-dark fw-bolder text-hover-primary fs-6">
                                                    {{$user->name}}
                                                </a>
                                                <span class="text-muted fw-bold text-muted d-block fs-7">
                                                    {{$user->email}}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                            {{$user->pass_lessons}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                            {{$user->fail_lessons}}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex flex-column w-100 me-2">
                                            <div class="d-flex flex-stack mb-2">
                                                <span class="text-muted me-2 fs-7 fw-bold">{{round($user->reading_rate)}}%</span>
                                            </div>
                                            <div class="progress h-6px w-100">
                                                <div class="progress-bar bg-primary"
                                                     role="progressbar"
                                                     style="width: {{round($user->reading_rate)}}%"
                                                     aria-valuenow="{{round($user->reading_rate)}}"
                                                     aria-valuemin="0"
                                                     aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        {{__('There is no users')}}
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @if(!blank($backubs))
            <div class="col-12">
                <div class="card card-xxl-stretch mb-5 mb-xl-8">
                    <div class="card-header border-0 pt-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bolder fs-3 mb-1">{{__('Backups')}}</span>
                        </h3>
                    </div>

                    <div class="card-body py-3">
                        <div class="table-responsive">

                            <table
                                class="table table-borderless table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">

                                <thead>
                                <tr class="fw-bolder text-muted">
                                    <th>#</th>
                                    <th class="min-w-150px">{{__('Backup Time')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach(array_reverse($backubs) as $backub)

                                    @php $backub_name = \Carbon\Carbon::parse($backub->getATime())->timezone('Asia/Riyadh')->isoFormat('LLLL'); @endphp

                                    <tr>
                                        <td>{{$loop->iteration}}</td>

                                        <td>
                                            <a href="javascript:;"
                                               class="text-dark fw-bolder text-hover-primary d-block fs-6">
                                                {{$backub_name}}
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{route('admin.backup.download', ['filename'=>encrypt($backub->getFilename()), 'download_name'=>encrypt($backub_name)])}}"
                                               class="btn btn-sm btn-icon btn-primary rounded-circle text-white">
                                                <i class="fas fa-download fs-3"></i>
                                            </a>
                                        </td>

                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

    </div>

@endsection


@push("styles")
    <style>
        .counter-success {
            background: #036632;
        }

        .counter-primary {
            background: #004c7a;
        }

        .counter-danger {
            background: #940226;
        }

        .counter-warning {
            background: #8b6400;
        }

        .counter {
            width: 70px;
            height: 70px;
            font-size: 2.2rem;
            font-weight: bolder !important;
            border-radius: 5px !important;
        }

        .chart {
            width: 100%;
            margin: 35px auto;
        }

        .custom-box-shadow {
            box-shadow: #def1ff 0 2px 20px 1px, #abdbff 0 1px 3px -1px;
        }

        .apexcharts-toolbar > *:not(div.apexcharts-menu-icon,div.apexcharts-menu) {
            display: none !important;
        }

        .apexcharts-tooltip-text {
            margin-inline-start: 3px !important;
        }

    </style>
@endpush

@push("scripts")

    <script src="/assets/libraries/apexcharts.min.js"></script>

    <script>
        (function () {

            @if($pages_views && !empty($pages_views))
            new ApexCharts(document.querySelector("#faz-chart-days-visitors"), {
                chart: {
                    height: 280,
                    type: "area"
                },
                dataLabels: {
                    enabled: false
                },
                series: [
                    {
                        name: "الزيارات",
                        data: {!! json_encode(array_values($pages_views)) !!},
                    }
                ],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.7,
                        opacityTo: 0.9,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    categories: {!! json_encode(array_keys($pages_views)) !!}
                },
            }).render();
            @endif

            @if($most_visited_pages && !empty($most_visited_pages))
            new ApexCharts(document.querySelector("#faz-chart-most-visited-pages"), {
                series: [{
                    name: "الزيارات",
                    data: {!! json_encode(array_values($most_visited_pages)) !!}
                }],
                chart: {
                    type: 'bar',
                    height: 350,
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        horizontal: true,
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opt) {
                        return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
                    },
                    dropShadow: {
                        enabled: true,
                        left: 1,
                        top: 1,
                        opacity: 0.3
                    }
                },
                xaxis: {
                    categories: {!! json_encode(array_keys($most_visited_pages)) !!},
                },
                yaxis: {
                    labels: {
                        show: false,
                    },
                }
            }).render();
            @endif

        })();
    </script>

@endpush
