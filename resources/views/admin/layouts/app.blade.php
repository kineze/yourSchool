<!DOCTYPE html>
<html lang="en">

@include('admin.includes.headerlinks')

<body class="m-0 font-sans antialiased font-normal text-left leading-default text-base dark:bg-slate-950 bg-gray-50 text-slate-500 dark:text-white">

    @if(Auth::check())
        @if(Auth::user()->hasRole('Admin'))
            @include('admin.includes.sidebar')
        @elseif(Auth::user()->hasAnyRole(['Manager', 'Coordinator', 'Finance', 'Consultant']))
            @include('office.includes.sidebar')
        @endif
    @endif


    <main class="relative h-full max-h-screen transition-all duration-200 ease-soft-in-out xl:ml-68 rounded-xl">

        @include('admin.includes.nav')

        @yield('content')

    </main>
    
    @include('admin.includes.slider')

</body>


@include('admin.includes.footerlinks')
@stack('scripts')

</html>