@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <!-- <div class="card-header">{{ __('Dashboard') }}</div> -->
                    <div class="card-header">Boolpress</div>
                    <div class="card-body">
                        <!-- @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }} -->
                         <h2>Benvenuto nella tua pagina di amministrazione</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
