@extends('app')

@section('content')
    @livewire('pelaksanaan-kegiatan.form-kegiatan', ['id' => $id])
@endsection