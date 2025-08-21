@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Komoditas</h2>
    <form action="{{ route('komoditas.update', $komoditas->id_komoditas) }}" method="POST">
        @method('PUT')
        @include('komoditas.form')
    </form>
</div>
@endsection
