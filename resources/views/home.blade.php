@extends('front.layout')
@push('styles')
    <style>
        .symbol-home {
            width: 100% !important;
        }

        .symbol-home img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .card .card-header {
            padding: 1.25rem 1.25rem 0 1.25rem !important;
        }
    </style>
@endpush
@section('content')

    {{-- Hero Section --}}
    @include('front.includes.hero')


    {{-- Subjects --}}
    <div class="">

        <div class="">
            <div class="container">
                <div class="text-center my-10" id="achievements" data-kt-scroll-offset="{default: 100, lg: 150}">
                    <h3 class="fs-2hx text-dark fw-bolder mb-5">
                        {{__('Subjects')}}
                    </h3>
                </div>

                <div class="row gy-10 py-20">
                    @forelse($subjects as $subject)
                        <div class="col-12 col-md-3 text-center g-10">
                            <a href="{{route('subjects.show' , $subject)}}" class="text-dark">
                                <div class="card shadow-sm h-300px w-100">
                                    <div
                                        class="card-header border-bottom-0 on-hover-d-none justify-content-center pt-5">
                                        <div class="symbol symbol-home">
                                            <img
                                                src="{{$subject->thumbnail_url}}"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div
                                            class="d-flex flex-column align-items-center justify-content-center gap-5 h-100">
                                            <a href="{{route('subjects.show' , $subject)}}"
                                               class="fs-1 text-dark fw-bold text-hover-primary on-hover-text-white">
                                                {{$subject->title}}
                                            </a>
{{--                                            <p class="text-muted on-hover-text-white fs-4">--}}
{{--                                                {{$subject->topics_count}} {{__('Topic_2')}}--}}
{{--                                            </p>--}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center text-white fs-4">
                            {{__('There is no subjects')}}
                        </div>
                    @endforelse
                </div>
            </div>
        </div>


    </div>

    {{-- Our Sponsors --}}
    <div class="py-10 mb-lg-20 mb-10">
        <div class="container py-10">
            <div class="text-center mb-12">
                <h3 class="fs-2hx mb-5" id="team" data-kt-scroll-offset="{default: 100, lg: 150}">
                    {{__('Sponsors')}}
                </h3>
            </div>
            <div class="row mt-20">
                <div class="col-12">
                    <x-sponsors-slider :sponsors="$sponsors"/>
                </div>
            </div>
        </div>
    </div>

    <x-not-logged-in></x-not-logged-in>

@endsection
