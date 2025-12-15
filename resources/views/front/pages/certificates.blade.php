@extends('front.pages.profile-layout')

@section('profile_content')

    <div class="card mb-5 mb-xl-10 shadow-sm">

        <div class="card-header border-0 cursor-pointer">
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{__('My Certificates')}}</h3>
            </div>
        </div>

        <div class="card-body" >
            <div class="row g-5">
                @forelse($user->certificates as $certificate)
                    <div class="col-lg-4 d-flex justify-content-center align-items-center">
                        <div class="card mb-5 rounded" style="width: 90% ;background: #fafafa !important;">
                            <img src="{{$certificate->url}}" class="card-img-top" alt="certificate">
                            <div class="card-body">
                                <h5 class="card-title mb-5">{{__("Subject")}} : {{$certificate->topic->title}}</h5>
                                <a href="{{route('users.certificates_download' , $certificate)}}" class="btn btn-primary btn-shadow">
                                    {{__('Download')}}
                                    <i class="fas fa-download ms-2"></i>
                                </a>
                                <a data-fslightbox="gallery" href="{{$certificate->url}}" class="btn btn-success btn-shadow ms-2">
                                    {{__('Show')}}
                                    <i class="fas fa-eye ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="fs-4">{{__('You don\'t have any certificate')}}</p>
                        <a href="{{route('subjects.index')}}" class="mt-5 btn btn-primary">
                            {{__('Start Learning Now')}}
                            <i class="fas fa-graduation-cap ms-2"></i>
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
