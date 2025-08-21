@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Hasil Panen</h2>
    <form action="{{ route('hasil-panen.store') }}" method="POST">
        @include('hasil_panen.form')
    </form>
</div>
@endsection
