<div class="row justify-content-center">
    <div class="col-12 w-100">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    {{__('Messages')}}
                </div>
                <div class="card-toolbar">
                    {{--<a href="{{route('admin.users.form')}}" class="btn btn-primary">
                        {{__('Add User')}}
                        <i class="fas fa-plus ms-2"></i>
                    </a>--}}
                </div>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-borderless table-striped gy-5 gs-7 border rounded">
                        <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>#</th>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Email')}}</th>
                            <th>{{__('Options')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $message)
                            <tr>
                                <td>{{ $messages->firstItem() + $loop->index }}</td>
                                <td>{{$message->title}}</td>
                                <td>{{$message->email}}</td>
                                <td>
                                    <div class="d-flex gap-5 align-items-center">

                                        {{-- Read --}}
                                        <button wire:click="read({{$message->id}})" data-bs-toggle="modal" data-bs-target="#read-message-modal"
                                                class="btn btn-success btn-sm">
                                            {{__('Read Message')}}
                                        </button>

                                        @if(!$message->read)
                                            {{-- Mark As Read --}}
                                            <button type="button" wire:click="markAsRead({{$message->id}})"
                                                    class="btn btn-danger btn-sm">
                                                {{__('Mark As Read')}}
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$messages->links()}}
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="read-message-modal" tabindex="-1" aria-labelledby="read-message-modal-Label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirm-modal-Label">{{__('Message')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{!! $selected_message?->message !!}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                    {{--<a href="#" class="btn btn-primary" id="confirm-model-route">
                        {{__('Confirm')}}
                    </a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
