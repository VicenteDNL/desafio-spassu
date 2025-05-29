<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@extends('layout.base')
@section('layout')
    @include('layout.components.list_actions', [
        'title' => 'Dashboard',
        'actions' => [],
    ])
    <div class="row">
        <div class="col-6">
            <div class="card shadow-sm ">
                <div class="card-body">
                    @include('pages.dashboard.charts.author-count-subject')
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow-sm ">
                <div class="card-body">
                    @include('pages.dashboard.charts.subject-book-percent')
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    @include('pages.dashboard.charts.subject-book-count')
                </div>
            </div>
        </div>
    </div>
    <div class="row  mt-4">
        <div class="col-12">
            <div class="card shadow-sm ">
                <div class="card-body">
                    @include('pages.dashboard.charts.book-summary')
                </div>
            </div>
        </div>
    </div>
    <div class="row  mt-4">
        <div class="col-12">
            <div class="card shadow-sm ">
                <div class="card-body">
                    @include('pages.dashboard.charts.subject-by-year')
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow-sm ">
                <div class="card-body">
                    @include('pages.dashboard.charts.author-book-count')
                </div>
            </div>
        </div>
    </div>
@endsection
