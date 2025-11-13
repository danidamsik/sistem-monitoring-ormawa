@extends('app')

@section('content')
    <div class="min-h-screen bg-gray-50 p-6 space-y-10">
        @livewire('penyetoran-lpj.card-statistik')
        @livewire('penyetoran-lpj.table-lpj')
    </div>
@endsection
