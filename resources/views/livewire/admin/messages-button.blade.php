@if($messages_count)
    <div class="d-flex align-items-center ms-1 ms-lg-3" title="{{__('Messages')}}">
        <a href="{{route('admin.messages.index')}}"
           class="btn btn-icon btn-primary position-relative w-30px w-md-40px h-30px h-md-40px">
            <i class="fas fa-mail-bulk"></i>
            @if($unread_messages_count)
                <span class="position-absolute top-0 end-50 translate-middle badge rounded-pill bg-danger">
                {{$unread_messages_count}}
            </span>
            @endif
        </a>
    </div>
@endif
