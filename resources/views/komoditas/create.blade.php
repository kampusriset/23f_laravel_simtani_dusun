@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Komoditas</h2>
    <form action="{{ route('komoditas.store') }}" method="POST">
        @include('komoditas.form')
    </form>
</div>
@endsection
