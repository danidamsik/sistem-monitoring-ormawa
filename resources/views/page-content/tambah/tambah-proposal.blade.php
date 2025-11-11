@extends('app')

@section('content')
    @livewire('pengajuan-proposal.form-pengajuan', [
        'id' => null,
        'func' => 'create',
        'title'=> "Tambah Pelaksanaan Kegiatan",
        'titleButton' => "Ajukan Proposal"
        ])
@endsection