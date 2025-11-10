@extends('app')

@section('content')
    @livewire('dashboard.top-card')

    @livewire('dashboard.chart')

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        @livewire('dashboard.recent-proposals')
        @livewire('dashboard.pending-lpj')
    </div>
@endsection
