@extends('layout.base')
@section('layout')
    <div class="d-flex flex-column h-100">
        <div class="flex-grow-1">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                @yield('header')
                            </div>
                            <div class="card-body">
                                @yield('body')
                            </div>
                            <div class="card-footer text-center py-3">
                                @yield('footer')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
