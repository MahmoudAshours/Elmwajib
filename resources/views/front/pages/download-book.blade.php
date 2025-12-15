@extends('front.layout')

@section('content')
    <div class="container py-20">
        <div class="row g-10 g-xl-10 mb-6 mb-xl-9 justify-content-center py-lg-20">
            <div class="col-12 my-10 text-center">
                <div class="display-6">
                    {{__('Download Book')}}
                </div>
            </div>

            {{-- Teacher Book --}}
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm card-hover card-hover-primary">
                    <div class="card-body d-flex justify-content-center text-center flex-column gap-5">
                        <div class="my-5">
                            <i class="fas fa-chalkboard-teacher display-1 text-primary on-hover-text-white"></i>
                        </div>
                        <div class="d-flex flex-column text-center justify-content-center align-items-center gap-3">
                            <div class="fs-1 on-hover-text-white">
                                {{__('Teacher Book')}}
                            </div>
                        </div>
                        <div>
                            <a href="{{route('download_book' , 'teacher')}}"
                               class="btn bg-primary bg-hover-white w-50 mt-5 text-white on-hover-bg-white on-hover-text-dark">
                                <i class="fas fa-download text-white on-hover-text-dark"></i>
                                {{__('Download')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Student Book --}}
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm card-hover card-hover-success">
                    <div class="card-body  d-flex justify-content-center text-center flex-column gap-5">
                        <div class="my-5">
                            <i class="fas fa-user-graduate display-1 text-success on-hover-text-white"></i>
                        </div>
                        <div class="d-flex flex-column text-center justify-content-center align-items-center gap-3">
                            <div class="fs-1 on-hover-text-white">
                                {{__('Student Book')}}
                            </div>
                        </div>
                        <div class="mt-5">
                            <a href="{{route('download_book' , 'student')}}"
                               class="btn bg-success bg-hover-white w-50 text-white on-hover-bg-white on-hover-text-dark">
                                <i class="fas fa-download text-white on-hover-text-dark"></i>
                                {{__('Download')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
