@php $user = auth()->user(); @endphp
<div class="landing-header {{request()->route()->getName() !=='home' ? 'faz-bg-image' : '' }}" data-kt-sticky="true"
     data-kt-sticky-name="landing-header"
     data-kt-sticky-offset="{default: '200px', lg: '300px'}">

    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center flex-equal">
                <button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
                    <span class="svg-icon svg-icon-2hx">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"/>
                                <path
                                    d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z"
                                    fill="#000000" opacity="0.3"/>
                            </g>
                        </svg>
                    </span>
                </button>

                <a href="{{route('home')}}">
                    <img alt="Logo" src="{{config('logo.default')}}"
                         class="logo-default h-80px" style="filter:brightness(0) invert(1);"/>
                    <img alt="Logo" src="{{config('logo.dark')}}"
                         class="logo-sticky h-70px"/>
                </a>
            </div>


            <div class="d-lg-block" id="kt_header_nav_wrapper">
                <div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu"
                     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                     data-kt-drawer-width="200px" data-kt-drawer-direction="start"
                     data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-place="true" data-kt-place-mode="prepend"
                     data-kt-place-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">

                    <div
                        class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-500 menu-state-title-primary nav nav-flush fs-2 fw-bold"
                        id="kt_landing_menu">

                        {{-- Home --}}
                        <div class="menu-item">
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('home')}}"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">{{__('Home')}}</a>
                        </div>

                        {{-- About Faz --}}
                        <div class="menu-item">
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('about_faz')}}"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">{{__('About Faz')}}</a>
                        </div>

                        {{-- About Book --}}
                        <div class="menu-item">
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('about_book')}}"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">{{__('About Book')}}</a>
                        </div>

                        {{-- Subjects --}}
                        <div class="menu-item">
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('subjects.index')}}"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">{{__('Subjects')}}</a>
                        </div>

                        {{-- Download Book --}}
                        <div class="menu-item">
                            <a href="{{route('download')}}" class="menu-link nav-link py-3 px-4 px-xxl-6"
                               data-kt-scroll-toggle="true"
                               data-kt-drawer-dismiss="true">
                                {{__('Download Book')}}
                            </a>
                        </div>

                        {{-- Contact Us --}}
                        <div class="menu-item">
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6" href="{{route('contact.form')}}"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">{{__('Contact Us')}}</a>
                        </div>
                        <hr>
                        <div class="menu-item">
                            <a class="menu-link nav-link py-3 px-4 px-xxl-6"
                               href="https://twitter.com/fazcenter?lang=ar" target="_blank"
                               data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true"><i class="fab fa-twitter fa-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-equal text-end me-1">

                @guest
                    <a href="{{route('login')}}" class="btn btn-success">{{__('Login')}}</a>
                @endguest
                @auth
                    <div class="dropdown">
                        <div class="symbol symbol-circle cursor-pointer symbol-50px dropdown-toggle text-white"
                             id="authDropdwon"
                             data-bs-toggle="dropdown"
                             aria-expanded="false">
                            <span class="me-2 fs-4 mw-50px d-none d-md-inline text-truncate">{{$user->name}}</span>
                            <img src="{{$user->thumbnail_url}}" alt=""/>

                        </div>

                        <ul class="dropdown-menu fs-5" aria-labelledby="authDropdwon">
                            @hasanyrole('super-admin|editor')
                            <li>
                                <a class="dropdown-item py-3" href="{{route('admin.dashboard')}}">
                                    <i class="fas fa-edit me-1 fs-4"></i>
                                    {{__('Dashboard')}}
                                </a>
                            </li>
                            @endhasanyrole
                            <li>
                                <a class="dropdown-item py-3" href="{{route('users.profile')}}">
                                    <i class="fas fa-user me-1 fs-4"></i>
                                    {{__('Profile')}}
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item py-3" href="{{route('logout')}}">
                                    <i class="fas fa-sign-out-alt me-1 fs-4"></i>
                                    {{__('Logout')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(".menu-link[href='{{url()->current()}}']").addClass('active');
    </script>
@endpush
