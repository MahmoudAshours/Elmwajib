@extends('front.layout')

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div id="kt_content_container" class="container">
            <div class="card mb-5 mb-xl-10 shadow-sm">
                <div class="card-body pt-9 pb-0">
                    <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                        <div class="me-7 mb-4">
                            <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                <img src="{{$user->thumbnail_url}}" alt="image"/>
                                <div
                                    class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                            </div>
                        </div>

                        <div class="flex-grow-1 d-flex">
                            <div class="d-flex justify-content-between align-items-center flex-wrap mb-2">
                                <div class="d-flex flex-column">
                                    <div class="d-flex align-items-center mb-2">
                                        <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">
                                            {{$user->name}}
                                        </a>
                                    </div>
                                    <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                        <a href="#"
                                           class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                            <i class="fas fa-user me-2"></i>
                                            {{__('Student')}}
                                        </a>
                                    </div>
                                </div>
                            </div>


{{--                            <div class="d-flex flex-wrap flex-stack">--}}
{{--                                <div class="d-flex flex-column flex-grow-1 pe-8">--}}
{{--                                    <div class="d-flex flex-wrap">--}}
{{--                                        <div--}}
{{--                                            class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">--}}
{{--                                            <div class="d-flex align-items-center">--}}
{{--                                                <i class="text-success fas fa-arrow-up me-2"></i>--}}
{{--                                                <div class="fs-2 fw-bolder" data-kt-countup="true"--}}
{{--                                                     data-kt-countup-value="4500" data-kt-countup-prefix="$">0--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <div class="fw-bold fs-6 text-gray-400">Earnings</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>

                    <div class="d-flex overflow-auto h-55px" style="overflow-x: auto">
                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x w-100 border-transparent fs-5 fw-bolder flex-nowrap"
                            id="nav-tab" role="tablist">
                            <li class="nav-item text-nowrap">
                                <a class="nav-link text-active-primary me-6 cursor-pointer"
                                   href="{{route('users.profile')}}">
                                    {{__('Profile')}}
                                </a>
                            </li>
                            <li class="nav-item text-nowrap">
                                <a class="nav-link text-active-primary me-6 cursor-pointer"
                                   href="{{route('users.account')}}">
                                    {{__('Account Settings')}}
                                </a>
                            </li>

                            <li class="nav-item text-nowrap">
                                <a class="nav-link text-active-primary me-6 cursor-pointer"
                                   href="{{route('users.certificates')}}">
                                    {{__('My Certificates')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @yield('profile_content')
        </div>
    </div>

@endsection

@push('scripts')
    <script src="{{asset('template/assets/js/custom/account/settings/signin-methods.js')}}"></script>
    <script>
        $('.nav-link[href="{{url()->current()}}"]').addClass('active');
    </script>
@endpush
