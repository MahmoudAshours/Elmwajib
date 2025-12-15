<div id="kt_aside" class="aside pb-5 pt-5 pt-lg-0" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'80px', '300px': '100px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">

    <div class="aside-logo py-8" id="kt_aside_logo">
        <a href="/" class="d-flex align-items-center ">
            <img alt="Logo" src="{{config('logo.without_text')}}" class="w-100px logo"/>
        </a>
    </div>

    <div class="aside-menu flex-column-fluid" id="kt_aside_menu">
        <div class="hover-scroll-overlay-y my-2 my-lg-5 pe-lg-n1" id="kt_aside_menu_wrapper"
             data-kt-scroll="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
             data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="5px">

            <div
                class="menu menu-column menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
                id="#kt_aside_menu" data-kt-menu="true">

                {{-- Home --}}
                <div class="menu-item py-2">
                    <a class="menu-link menu-center" href="{{route('home')}}"
                       data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="fas fa-home fs-2"></i>
                        </span>
                        <span class="menu-title">{{__('Home')}}</span>
                    </a>
                </div>

                @canany(['manage-dashboard', 'manage-content'])
                    {{-- Dashboard --}}
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center" href="{{route('admin.dashboard')}}"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon me-0">
                            <i class="fas fa-cogs fs-2"></i>
                        </span>
                            <span class="menu-title">{{__('Dashboard')}}</span>
                        </a>
                    </div>
                @endcanany

                @can('manage-users')
                    {{-- Users --}}
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center" href="{{route('admin.users.index')}}"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="fas fa-users fs-2"></i>
                            </span>
                            <span class="menu-title">{{__('Users')}}</span>
                        </a>
                    </div>
                @endcan

                @can('manage-content')
                    {{-- Subjects --}}
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center" href="{{route('admin.subjects.index')}}"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="fas fa-th-list fs-2"></i>
                            </span>
                            <span class="menu-title">{{__('Subjects')}}</span>
                        </a>
                    </div>

                    {{-- Topics --}}
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center" href="{{route('admin.topics.index')}}"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="fas fa-bookmark fs-2"></i>
                            </span>
                            <span class="menu-title">{{__('Topics')}}</span>
                        </a>
                    </div>

                    {{-- Lessons --}}
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center" href="{{route('admin.lessons.index')}}"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="fas fa-book-open fs-2"></i>
                            </span>
                            <span class="menu-title">{{__('Lessons')}}</span>
                        </a>
                    </div>

                    {{-- Questions --}}
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center" href="{{route('admin.questions.index')}}"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="fas fa-question fs-2"></i>
                            </span>
                            <span class="menu-title">{{__('Questions')}}</span>
                        </a>
                    </div>
                @endcan

                @canany(['manage-dashboard', 'manage-content'])
                    {{-- Sponsors --}}
                    <div class="menu-item py-2">
                        <a class="menu-link menu-center" href="{{route('admin.sponsors.index')}}"
                           data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon me-0">
                                <i class="fas fa-handshake fs-2"></i>
                            </span>
                            <span class="menu-title">{{__('Sponsors')}}</span>
                        </a>
                    </div>
                @endcanany

            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $("a.menu-link[href='{{url()->current()}}']").addClass('active');
    </script>
@endpush
