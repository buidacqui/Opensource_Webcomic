@extends('layouts.app')

@section('content')
@section('slide')
@include('pages.slide')
@endsection

@include('layouts.nav')
<!-- Bootstrap CSS -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu quản lý</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
