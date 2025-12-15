@extends('front.layout')

@section('content')
    <div class="container py-20">
        <div class="row g-6 g-xl-9 mb-6 mb-xl-9">
            <div class="col-12 my-10 text-center">
                <div class="text-primary display-5">{{$topic->title}}</div>
                <h2 class="mt-5">{{__('Lessons')}}</h2>
            </div>
            @forelse($lessons as $lesson)
                <div class="col-md-12">
                    <div class="card h-200px shadow-sm faz-card rounded-2"
                         style="background-image: url('{{$lesson->thumbnail_url}}');">
                        <div
                            class="card-body d-flex flex-md-row flex-column justify-content-between align-items-center p-8">

                            <div
                                class="faz-card-index d-flex justify-content-center flex-column align-items-center text-center text-md-start align-items-md-start">
                                <a href="{{route('lessons.show' , $lesson)}}" class="">
                                    <div
                                        class="display-6 fw-bolder mb-2 text-white text-hover-success">{{$lesson->title}}</div>
                                </a>
                            </div>
                            <div class="w-md-25 w-100 faz-card-index text-md-end text-center">
                                <a href="{{route('lessons.show' , $lesson)}}"
                                   class="btn btn-primary">{{__('Start Learning')}}
                                    <i class="fas fa-graduation-cap fs-4 ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 my-10 text-center">
                    <p>{{__('There is no data')}}</p>
                </div>
            @endforelse
            <div class="col-12 align-self-center mt-20">
                {{$lessons->links()}}
            </div>
        </div>
    </div>
@endsection

