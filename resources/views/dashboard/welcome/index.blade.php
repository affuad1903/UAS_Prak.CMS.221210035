@extends('dashboard.layout')
@section('content')
    <p class="card-title">WELCOME</p>
    <div class="table-responsive">
        <p>Hallo {{Auth::user()->name}}. Selamat datang di AFFANDI Admin.</p>
    </div>  
@endsection
