@extends('front.layout')

@section('content')
    <div class="container py-20">
        <div class="row g-10 g-xl-10 mb-6 mb-xl-9 justify-content-center py-lg-20">
            <div class="col-12 my-10 text-center">
                <div class="display-6">
                    {{$lesson->title}}
                </div>
            </div>

            @guest
                <x-alert title="{{__('Login Now')}}" icon="fa-sign-in-alt"
                         body="{{__('login_required_message')}}"
                         withLoginButtons/>
            @endguest

            {{-- Content --}}
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm card-hover card-hover-primary">
                    <div class="card-body  d-flex justify-content-center text-center flex-column">
                        <div class="my-5">
                            <i class="fas fa-book-open display-1 text-primary on-hover-text-white"></i>
                        </div>
                        <div class="d-flex flex-column text-center justify-content-center align-items-center gap-3">
                            <div class="fs-1 on-hover-text-white">
                                {{__('Read Content')}}
                            </div>
                            <p class="text-muted fs-4 on-hover-text-white">

                            </p>
                        </div>
                        <div>
                            <a href="{{route('lessons.content' , $lesson)}}"
                               class="btn bg-primary bg-hover-white w-50 mt-5 text-white on-hover-bg-white on-hover-text-dark">
                                {{__('Start')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quiz --}}
            <div class="col-lg-4">
                <div class="card h-100 shadow-sm card-hover card-hover-success">
                    <div class="card-body  d-flex justify-content-center text-center flex-column">
                        <div class="my-5">
                            <i class="fas fa-chalkboard display-1 text-success on-hover-text-white"></i>
                        </div>
                        <div class="d-flex flex-column text-center justify-content-center align-items-center gap-3">
                            <div class="fs-1 on-hover-text-white">
                                {{__('Quiz')}}
                            </div>
                            <p class="text-muted fs-4 on-hover-text-white">

                            </p>
                        </div>
                        <div class="mt-5">
                            <a href="{{route('lessons.quiz' , $lesson)}}"
                               class="btn bg-success bg-hover-white w-50 text-white on-hover-bg-white on-hover-text-dark">{{__('Start')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
