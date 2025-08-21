@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Anggota</h2>
    <form action="{{ route('anggota.update', $anggota->id_anggota) }}" method="POST">
        @method('PUT')
        @include('anggota.form')
    </form>
</div>
@endsection
