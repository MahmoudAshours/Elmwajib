<div
    class="alert alert-dismissible alert-success align-items-center justify-content-between d-flex flex-column flex-sm-row p-5 mb-10">
    <div class="d-flex align-items-center flex-column flex-md-row">
                    <span class="me-4 mb-5 mb-sm-0">
                    <i class="fas {{$icon}} fa-sign-in-alt display-6 text-success"></i>
                </span>
        <div class="d-flex flex-column pe-0 pe-sm-10 text-center text-md-start">
            <h2 class="fw-bolder">{{$title}}</h2>
            <p class="fs-4">
                {{$body}}
            </p>
        </div>
    </div>
    <div class="d-flex gap-5 align-items-center">
        @if($attributes->has('withLoginButtons'))
            <a href="{{route('login')}}" class="btn btn-primary">
                {{__('Login')}}
            </a>
        @endif
        <button type="button"
                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
            <span class="svg-icon svg-icon-1 svg-icon-primary fs-1">&times;</span>
        </button>
    </div>
</div>
