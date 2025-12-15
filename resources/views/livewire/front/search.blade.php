<div>

    <div class="row">

        <div class="col-md-6">
            <div wire:ignore class="mb-5">
                <select id="select2-dropdown" class="form-select form-select-lg mb-3 form-select-solid fw-bold" direction="rtl" multiple>
                    @foreach($topics as $topic)
                        <option value="{{$topic->id}}">{{$topic->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group has-validation mb-20">
                <input type="text" class="form-control form-control-solid  input-search" id="search-form" placeholder="البحث في الدروس" wire:model="query">
                <span class="input-group-text btn-search d-flex justify-content-center align-items-center">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row">
            @forelse($lessons as $lesson)
                <div class="col-sm-6 col-lg-4 col-xl-3">
                    <div class="card mb-5">
                        <img src="{{$lesson->thumbnail_url}}" class="card-img-top" style="" height="200" alt="...">
                        <div class="card-body">

                            <div class="card-title d-flex justify-content-between align-items-center">
                                <h5>{{$lesson->title}}</h5>
                                @if($lesson->learning_islam_url)
                                    <a href="{{$lesson->learning_islam_url}}"
                                       target="_blank"
                                       data-bs-toggle="tooltip"
                                       data-bs-html="true"
                                       data-bs-placement="top"
                                       title="<strong>{{__('lesson_from_taa')}}</strong>"
                                       class="mx-2">
                                        <img src="{{asset('assets/Taaa-logo.svg')}}" alt="Taaa-logo" height="30" width="30" />
                                    </a>
                                @endif
                            </div>

                            <hr>

                            <div class="breadcrumb  d-flex align-items-center">
                                <a href="{{route('subjects.show' , $lesson->topic->subject->id)}}" class="d-flex align-items-center">{{$lesson->topic->subject->title}}</a>
                                <i class="fas fa-caret-left mx-2"></i>
                                <span class="d-flex align-items-center">{{$lesson->topic->title}}</span>
                                @isset($lesson->parent->title)
                                    <i class="fas fa-caret-left mx-2"></i>
                                    <span class="d-flex align-items-center">{{$lesson->parent->title}}</span>
                                @endisset
                            </div>

                            <hr>

                            <div class="actions d-flex align-items-center gap-3">
                                <a href="{{route('lessons.show' , $lesson)}}" class="btn btn-sm btn-success fs-4 {{(!$lesson->questions()->exists() && !$lesson->has_pdf ) ? 'w-100':''}}">
                                    {{__('Content')}}
                                </a>
                                @if($lesson->questions()->exists())
                                    <a href="{{route('lessons.quiz' , $lesson)}}" class="btn btn-sm btn-primary fs-4">
                                        {{__('Quiz')}}
                                    </a>
                                @endif
                                @if($lesson->has_pdf)
                                    <a href="{{route('lessons.download' , $lesson)}}" class="d-flex justify-content-center align-items-center btn btn-icon-danger btn-sm btn-secondary fs-4">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning  d-flex align-items-center justify-content-center">
                    <span class="h1">لا يوجد دروس لعرضها ... ابحث مرة اخرى</span>
                </div>
            @endforelse

        </div>
    </div>
</div>

@push("styles")
    <style>
        .card {
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        hr {
            border: 0;
            height: 1px;
            background: #b5b5b5;
        }

        .form-select-lg {
            border-radius: 100px !important;

        }

        .select2-selection__rendered {
            line-height: 32px !important;
        }

        .select2-container .select2-selection--single {
            height: 32px !important;
        }

        .select2-selection__arrow {
            height: 32px !important;
        }
    </style>
@endpush

@push("scripts")
    <script>
        $(function () {

            let mySelect = $('#select2-dropdown');

            mySelect.select2({placeholder: "اختر الموضوع .."});

            mySelect.select2('val', @this.selectedTopics);

            mySelect.css({
                'font-size': '1.2rem',
            });

            mySelect.on('change', function (e) {
                var data = $('#select2-dropdown').select2("val");
                $('span.select2-selection__choice__display').css({
                    'margin-right': '40px',
                    'font-size': '1.2rem',
                });
                @this.
                set('selectedTopics', data);
            }).trigger('change');

            Livewire.on('queryUpdated', function () {
                $('#select2-dropdown').select2("val", false);
            });

        });

    </script>
@endpush
