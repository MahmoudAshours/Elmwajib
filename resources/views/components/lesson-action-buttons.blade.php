<div class="d-flex justify-content-between align-items-center">

    <div class="{{$lesson->parent_id ? 'px-10' :''}}">

        <a href="{{route('lessons.show' , $lesson)}}">
            <div class="text-primary text-hover-success title d-inline"
                 data-clean-title="{{$lesson->clean_title}}">{{$lesson->title}}
            </div>
        </a>

        @if($attributes->has('user') && $user?->isLessonPassed($lesson))
            <i class="fa fa-check-circle text-success ms-3 fs-2"
               data-bs-toggle="tooltip"
               data-bs-placement="right"
               data-original-title="{{__('Completed')}}"
               title="{{__('Completed')}}">
            </i>
        @endif
    </div>

    {{-- Buttons on Mobile --}}
    <div class="btn-group d-block d-md-none">
        <button type="button" class="btn btn-primary dropdown-toggle fw-bold" data-bs-toggle="dropdown"
                aria-expanded="false">
            {{__('Options')}}
        </button>
        <ul class="dropdown-menu p-2">

            <li>
                <a href="{{route('lessons.show' , $lesson)}}"
                   class="fs-5 dropdown-item d-flex gap-2 align-items-center py-5 px-2">
                    <i class="fas fa-window-maximize  custom-icon-font"></i> {{__('Content')}}
                </a>
            </li>

            @if($lesson->questions_count)
                <li>

                    <a href="{{route('lessons.quiz' , $lesson)}}"
                       class="fs-5 dropdown-item d-flex gap-2 align-items-center py-5 px-2">
                        <i class="fas fa-question  custom-icon-font"></i> {{__('Quiz')}}
                    </a>
                </li>
            @endif

            @if($lesson->has_pdf)
                <li>
                    <a href="{{route('lessons.download' , $lesson)}}" class="fs-5 gap-2 dropdown-item py-5 px-2">
                        <i class="fas fa-file-pdf  custom-icon-font"></i> {{__('Attachment')}}
                    </a>
                </li>
            @endif

            @if($lesson->learning_islam_url)
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="{{$lesson->learning_islam_url}}"
                       target="_blank"
                       data-bs-toggle="tooltip"
                       data-bs-html="true"
                       data-bs-placement="top"
                       title="<strong>{{__('lesson_from_taa')}}</strong>"
                       class="dropdown-item d-flex justify-content-center align-items-center">
                        <img src="{{asset('assets/Taaa-logo.svg')}}" alt="Taaa-logo" height="30" width="30"/>
                    </a>
                </li>
            @endif

        </ul>
    </div>

    {{-- Buttons on Tablet Or Above --}}
    <div class="d-none d-md-flex justify-content-end align-items-center gap-2">

        <a href="{{route('lessons.show' , $lesson)}}" class="btn btn-sm btn-success fs-4">
            {{__('Content')}}
        </a>

        @if($lesson->questions_count)
            <a href="{{route('lessons.quiz' , $lesson)}}" class="btn btn-sm btn-icon-white btn-primary fs-4">
                {{__('Quiz')}}
            </a>
        @endif

        @if($lesson->has_pdf)
            <a href="{{route('lessons.download' , $lesson)}}" class="btn btn-icon-danger btn-sm btn-secondary fs-4">
                <i class="fas fa-file-pdf"></i>
                PDF
            </a>
        @endif

        @if($lesson->learning_islam_url)
            <a href="{{$lesson->learning_islam_url}}"
               target="_blank"
               data-bs-toggle="tooltip"
               data-bs-html="true"
               data-bs-placement="top"
               title="<strong>{{__('lesson_from_taa')}}</strong>"
               class="mx-2">
                <img src="{{asset('assets/Taaa-logo.svg')}}" alt="Taaa-logo" height="30" width="30"/>
            </a>
        @endif

    </div>
</div>


@push("styles")
    <style>
        .custom-icon-font {
            font-size: 22px;
        }
    </style>
@endpush
