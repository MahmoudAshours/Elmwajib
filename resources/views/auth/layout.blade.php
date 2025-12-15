@extends('front.layout')

@section('content')
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed py-20"
        style="background-image: url(assets/media/illustrations/development-hd.png)">
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <div class="w-lg-500px w-100 bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                @yield('auth_content')
            </div>
        </div>
    </div>
@endsection
