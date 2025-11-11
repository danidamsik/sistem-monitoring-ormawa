@extends('app')

@section('content')
    <!-- Komponen Utama - Pengajuan Proposal -->
    <div class="min-h-screen bg-gray-50 p-6">

        @livewire('pengajuan-proposal.top-card')

        @livewire('pengajuan-proposal.table-proposal')
    </div>
@endsection
