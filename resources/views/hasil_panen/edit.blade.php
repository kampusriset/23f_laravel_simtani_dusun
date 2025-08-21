@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hasil Panen</h2>
    <form action="{{ route('hasil-panen.update', $panen->id_panen) }}" method="POST">
        @csrf
        @method('PUT')
        @include('hasil_panen.form')
    </form>
</div>
@endsection
