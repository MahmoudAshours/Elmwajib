@extends('admin.layout' , ['title' => __('Questions')])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{__('Questions')}}
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('admin.questions.add')}}" class="btn btn-primary">
                            {{__('Add Question')}}
                            <i class="fas fa-plus ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <x-datatable>
                        <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>#</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Subject')}}</th>
                            <th>{{__('Lesson')}}</th>
                            <th>{{__('Correct Answer')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($questions as $question)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="text-truncate">{{summary($question->title, 50)}}</td>
                                <td>
                                    <span class="badge bg-primary fs-4 mb-2">{{$question->lesson->topic->title}}</span>
                                    @isset($question->lesson->parent->title)
                                        <span class="badge bg-secondary text-dark fs-4">
                                            {{$question->lesson->parent->title}}
                                        </span>
                                    @endisset

                                </td>
                                <td>{{$question->lesson->title}}</td>
                                
                                <td class="text-truncate">{{summary($question->correct_answer, 50)}}</td>
                                <td>
                                    <div class="d-flex gap-5 align-items-center">

                                        {{-- Edit --}}
                                        <a href="{{route('admin.questions.edit' , $question)}}" class="btn btn-success btn-sm">
                                            {{__('Edit')}}
                                        </a>

                                        {{-- Delete --}}
                                        <a data-bs-toggle="modal" data-bs-target="#confirm-modal" data-url="{{route('admin.questions.delete' , $question)}}" class="btn btn-danger btn-sm">
                                            {{__('Delete')}}
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </x-datatable>
                </div>
            </div>
        </div>
    </div>
@endsection
