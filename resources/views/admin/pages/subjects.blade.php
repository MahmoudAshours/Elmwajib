@extends('admin.layout' , ['title' => __('Subjects')])

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        {{__('Subjects')}}
                    </div>
                    <div class="card-toolbar">
                        <a href="{{route('admin.subjects.form')}}" class="btn btn-primary">
                            {{__('Add Subject')}}
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
                            <th>{{__('Number of topics')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$subject->title}}</td>
                                <td>{{$subject->topics_count}}</td>
                                <td>
                                    <div class="d-flex gap-5 align-items-center">

                                        {{-- Edit --}}
                                        <a href="{{route('admin.subjects.form' , $subject)}}"
                                           class="btn btn-success btn-sm">
                                            {{__('Edit')}}
                                        </a>

                                        {{-- Delete --}}
                                        <a data-bs-toggle="modal" data-bs-target="#confirm-modal"
                                           data-url="{{route('admin.subjects.delete' , $subject)}}"
                                           class="btn btn-danger btn-sm">
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
