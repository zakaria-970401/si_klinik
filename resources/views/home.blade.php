@extends('layouts.base')

@section('title', 'HOME')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-12">
                    <div class="alert alert-info border-2 d-flex align-items-center" role="alert">
                        <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
                        <p class="mb-0 flex-1">Hello {{ Auth::user()->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript"></script>

@endsection
