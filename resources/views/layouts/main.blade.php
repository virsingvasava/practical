@extends('base.base')

@section('layout')

    @include('partials.header')

    @include('partials.sidebar')

    <!-- BEGIN: Content-->

                  @yield('content')
         
    <!-- END: Content-->
    @include('partials.widget')

    @include('partials.footer')

@endsection
