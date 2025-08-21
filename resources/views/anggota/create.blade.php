@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Anggota</h2>
    <form action="{{ route('anggota.store') }}" method="POST">
        @include('anggota.form')
    </form>
</div>
@endsection
