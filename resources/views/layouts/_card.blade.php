@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
                <i class="fas fa-user"></i> <!-- uses solid style -->
                <i class="far fa-user"></i> <!-- uses regular style -->
                <i class="fal fa-user"></i> <!-- uses light style -->
                <!--brand icon-->
                <i class="fab fa-github-square"></i> <!-- uses brands style -->
            @yield('title')
        </div>
        <div class="card-body">
            @yield('body')
        </div>
        <div class="card-footer text-muted">
            @yield('footer')
        </div>
    </div>
@endsection
