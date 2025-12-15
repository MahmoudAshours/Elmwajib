@extends('front.layout')

@section('content')
    <div class="container py-20">
        <div class="row g-8 g-xl-10 mb-6 mb-xl-9">
            <div class="col-12 my-10 text-center">
                <div class="display-4 ">{{$subject->title}}</div>
            </div>
            @foreach($subject->topics as $topic)
                <ul class="list-group">
                    <li class="list-group-item p-5 active head-4" style="font-size: 1.6rem;">{{$topic->title}}
                        @if($user && $user->isCompletedTopic($topic))
                            <i class="fa fa-check-circle text-white ms-3 fs-2"
                               data-bs-toggle="tooltip"
                               data-bs-placement="right"
                               data-original-title="{{__('Completed')}}"
                               title="{{__('Completed')}}">
                            </i>
                        @endif
                    </li>
                    @foreach($topic->lessons as $lesson)
                        @if($lesson->parent_id)
                            <li class="list-group-item py-5" style="font-size: 1.5rem;">
                                <x-lesson-action-buttons :lesson="$lesson" :user="$user"></x-lesson-action-buttons>
                            </li>
                        @else
                            <li class="list-group-item p-5" style="font-size: 1.5rem;">
                                @if($lesson->summary)
                                    <x-lesson-action-buttons :lesson="$lesson" :user="$user"></x-lesson-action-buttons>
                                @else
                                    <div class="text-black">{{$lesson->title}}</div>
                                @endif
                            </li>
                        @endif
                    @endforeach
                </ul>
            @endforeach
        </div>
    </div>
@endsection
