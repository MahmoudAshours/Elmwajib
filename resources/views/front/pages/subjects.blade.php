@extends('front.layout')

@section('content')
    <div class="container py-20">
        <div class="row g-8 g-xl-10 mb-6 mb-xl-9">

            <div class="input-group d-flex mb-20 mb-5">
                <input type="text" id="query" class="form-control form-control-solid  input-search"
                       placeholder="البحث في الدروس">
                <button class="input-group-text btn-search d-flex justify-content-center align-items-center">
                    <i class="fa fa-search"></i>
                </button>
            </div>

            <div id="lessons-list">
                @forelse($subjects as $subject)
                    <h1 class="display-5 my-3 head-4 subject">{{$subject->title}}</h1>
                    @foreach($subject->topics as $topic)
                        <ul class="list-group">
                            <li class="list-group-item p-5 active head-4 topic"
                                style="font-size: 1.6rem;">{{$topic->title}}

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
                                    <li class="list-group-item py-5 lesson" style="font-size: 1.5rem;">
                                        <x-lesson-action-buttons :lesson="$lesson" :user="$user"></x-lesson-action-buttons>
                                    </li>
                                @else
                                    <li class="list-group-item p-5 lesson" style="font-size: 1.5rem;">
                                        @if($lesson->summary)
                                            <x-lesson-action-buttons :lesson="$lesson" :user="$user"></x-lesson-action-buttons>
                                        @else
                                            <div class="text-black parent">{{$lesson->title}}</div>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    @endforeach
                @empty
                    <div class="col-12 my-10 text-center">
                        <p>{{__('There is no data')}}</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection

@push("styles")
    <style>

        .input-search {
            width: 92%;
            border-radius: 0 10rem 10rem 0;
        }

        .input-search, select {
            height: 50px !important;
        }

        .btn-search {
            width: 8%;
            border-radius: 10rem 0 0 10rem;
            background: #1683c5;
        }

        .btn-search i {
            color: #FFF;
            font-size: 1.5rem;
        }

        .form-select-lg {
            border-radius: 100px !important;
        }

        @media (max-width: 767px) {
            .btn-search {
                width: 20%;
                border-radius: 10rem 0 0 10rem;
                cursor: pointer;
            }
        }
    </style>
@endpush

@push("scripts")
    <script>

        $('#query').on('input', e => {

            let query, lessons_container, lesson_li, clean_title, i;

            query = e.target.value.replace(/[\u064B-\u0653]/g, "");

            $('.parent').parent().removeClass('lesson');

            lessons_container = document.getElementById("lessons-list");
            lesson_li = lessons_container.getElementsByClassName("lesson");


            for (i = 0; i < lesson_li.length; i++) {

                clean_title = lesson_li[i].getElementsByClassName('title')[0].dataset.cleanTitle;

                if (clean_title.indexOf(query) > -1) {
                    $('.topic,.subject').removeClass('d-none');
                    $('.parent').closest('li').removeClass('d-none');

                    lesson_li[i].closest('li').style.display = "";
                } else {
                    $('.topic,.subject').addClass('d-none');
                    $('.parent').closest('li').addClass('d-none');

                    lesson_li[i].closest('li').style.display = "none";
                }
            }
        });
    </script>
@endpush
