<!doctype html>
<html lang="ar" direction="rtl" dir="rtl" style="direction: rtl">
@include('includes.head')

<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed">
<div class="d-flex flex-column flex-root">
    <div class="page d-flex flex-row flex-column-fluid">s
        {{-- Admin Sidebar Section --}}
        @include('admin.includes.aside')
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

            {{-- Admin Header Section --}}
            @include('admin.includes.header' , ['title' => $title??''])

            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <div id="kt_content_container" class="container-fluid pb-20 px-xl-20">

                    {{-- Content --}}
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')
@include('includes.scripts')
</body>
</html>
