@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-center">
            <h4>Selamat datang di Desa Sesua</h4>
        </div>
        <div class="card-body bg">
            <div class="chocolat-parent">
                <div class="d-flex justify-content-center">
                    <img alt="image" src="{{ asset('images/logo.png') }}" class="img-fluid" style="height: 100px">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('stylesheet')
    <style>
        .bg {
            background-image: url("{{ asset('images/bg.jpg') }}");
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 500px;
        }

    </style>
@endpush
