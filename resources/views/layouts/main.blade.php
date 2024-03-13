<!DOCTYPE html>
<html lang="en">

    {{-- header --}}

    @include('layouts.header')

    {{-- header --}}

    {{-- sidebar --}}

    @include('layouts.sidebar')

    {{-- sidebar --}}

    {{-- navbar --}}

    @include('layouts.navbar')

    {{-- navbar --}}

    <!-- Content Wrapper. Contains page content -->
    <main class="py-4">
        @yield('content')
    </main>

    {{-- footer --}}

    @include('layouts.footer')

    {{-- footer --}}

    

