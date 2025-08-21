@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Jadwal Tanam</h2>
    <form action="{{ route('jadwal-tanam.update', $jadwal->id_tanam) }}" method="POST">
        @csrf
        @method('PUT')
        @include('jadwal_tanam.form')
    </form>
</div>
@endsection
