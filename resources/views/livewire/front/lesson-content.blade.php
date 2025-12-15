<div>
    <div class="container py-20">
        <div class="row">
            <div class="col-12 my-10 text-center">
                @if($lesson->thumbnail()->exists())
                    <div class="thumbnail-container mb-10">
                        <img class="thumbnail_img" src="{{$lesson->thumbnail_url}}" alt="...">
                    </div>
                @endif

                <div class="display-6 fade-in lesson-title ">
                    {{$lesson->title}}
                </div>
                <h3 class="mt-5 text-primary">{{__('Content')}}</h3>
            </div>
            <div class="col-12">
                <div id="lessonContent" class="shadow h-100 min-h-500px d-flex flex-column justify-content-between">
                    <div class="fs-1 p-8">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="fade-in header_title">{{$lesson_data[$lesson_data_current_key]['content_title']}}</h1>
                            @auth
                                @if($is_completed_topic)
                                    <a class="btn btn-primary fade-in" href="{{route('topics.certificate.download', $lesson->topic_id)}}">
                                        <i class="fas fa-certificate ms-2"></i>
                                        {{__('Download Certificate')}}
                                    </a>
                                @endif
                            @endauth
                        </div>
                        <hr>
                        <div class="fade-in description">
                            {!! $lesson_data[$lesson_data_current_key]['content_description'] !!}
                        </div>
                    </div>
                    <div class="d-flex gap-10 justify-content-center align-items-center mt-10 pb-10">
                        @if($show_prev_content_btn)
                            <button class="btn btn-success prev-btn" type="button" wire:click="$set('lesson_data_current_key', {{ $lesson_data_current_key - 1 }})">
                                <i class="fas fa-arrow-right me-1"></i>
                                {{__('Previous')}}
                            </button>
                        @endif


                        @if($show_next_content_btn)
                            <button class="btn btn-success fade-in next-btn" wire:click="$set('lesson_data_current_key', {{ $lesson_data_current_key + 1 }})">
                                {{__('Next')}}
                                <i class="fas fa-arrow-left ms-2" style="user-select: none;pointer-events: none"></i>
                            </button>
                        @endif

                        @if($show_next_lesson_btn)
                            <a href="{{route('lessons.content',['lesson' => $lesson , 'next' => true])}}" class="btn btn-success fade-in next-lesson-btn ">
                                {{__('Next Lesson')}}
                                <i class="fas fa-arrow-left ms-2" style="user-select: none;pointer-events: none"></i>
                            </a>
                        @endif

                        @if($show_start_quiz_btn)
                            <a class="btn btn-success" id="next-button" href="{{route('lessons.quiz' , ['lesson' => $lesson , 'completed' => true])}}">
                                {{__('Start Lesson Quiz')}}
                            </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push("styles")
    <style>
        .fade-in {
            animation: fadeIn ease 2s;
            -webkit-animation: fadeIn ease 2s;
            -moz-animation: fadeIn ease 2s;
            -o-animation: fadeIn ease 2s;
            -ms-animation: fadeIn ease 2s;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-o-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @-ms-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
@endpush
