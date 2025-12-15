@extends('admin.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{$title}}
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.questions.store' , $question?:'')}}" method="post">
                        @csrf

                        {{-- Title --}}
                        <div class="mb-10">
                            <label for="title" class="form-label">{{__('Question Title')}}</label>
                            <x-editor id="title">{{$question?->title ?? old('title')}}</x-editor>

                            @error('title')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Correct Answer --}}
                        <div class="mb-10">
                            <label for="correct_answer" class="form-label">{{__('Correct Answer')}}</label>
                            <input type="text" class="form-control @error('correct_answer') is-invalid @enderror"
                                   name="correct_answer" id="correct_answer"
                                   value="{{$question?->correct_answer ?? old('correct_answer')}}">

                            @error('correct_answer')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                        {{-- Options --}}
                        <div id="options" class="mb-10">
                            <label for="" class="form-label mb-3">{{__('Options')}}</label>
                            @error('options')
                            <span class="text-danger">{{$message}}</span>
                            @enderror


                            <div class="form-group">

                                <div data-repeater-list="options">
                                    @if($question && ($options = $question->options_only) && !blank($options))
                                        @foreach($options as $option)
                                            <div data-repeater-item="">
                                                <div class="row align-items-center mb-3">
                                                    <div class="col-md-10">
                                                        <input type="text" class="form-control mb-2 mb-md-0 text-start"
                                                               name="body" value="{{$option}}"/>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="javascript:;" data-repeater-delete
                                                           class="btn btn-sm btn-danger w-100">
                                                            <i class="la la-trash-o fs-5"></i>
                                                            {{__('Delete')}}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div data-repeater-item>
                                            <div class="row align-items-center mb-3">
                                                <div class="col-md-10">
                                                    <input type="text" name="body"
                                                           class="form-control mb-2 mb-md-0 text-start"/>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="javascript:;" data-repeater-delete
                                                       class="btn btn-sm btn-danger w-100">
                                                        <i class="la la-trash-o fs-5"></i>
                                                        {{__('Delete')}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group mt-5">
                                <a href="javascript:;" data-repeater-create class="btn btn-light-primary btn-sm">
                                    <i class="la la-plus"></i>
                                    {{__('Add Option')}}
                                </a>
                            </div>
                        </div>

                        {{-- Lesson --}}
                        <div class="mb-10">
                            <label for="lesson_id" class="form-label">{{__('Lesson')}}</label>
                            <select class="form-select @error('lesson_id') is-invalid @enderror" name="lesson_id"
                                    id="lesson_id" data-control="select2"
                                    data-placeholder="{{__('Select an lesson')}}">
                                <option></option>
                                @forelse($lessons as $lesson)
                                    <option
                                        value="{{$lesson->id}}" {{$lesson->id == $question?->lesson_id ? 'selected' :''}}> {{$lesson->title}}</option>
                                @empty
                                    <option value="" disabled>{{__('There is no lessons')}}</option>
                                @endforelse
                            </select>

                            @error('lesson_id')
                            <span class="text-danger d-block">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-center mt-10">
                            <button type="submit" class="btn btn-primary">
                                {{__('Save')}}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let repeater = $('#options').repeater({
            initEmpty: false,
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    </script>
@endpush
