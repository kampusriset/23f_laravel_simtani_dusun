@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Jadwal Tanam</h2>
    <form action="{{ route('jadwal-tanam.store') }}" method="POST">
        @include('jadwal_tanam.form')
    </form>
</div>
@endsection
