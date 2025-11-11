@extends('app')

@section('content')
    @livewire('pengajuan-proposal.form-pengajuan', [
        'id' => $id,
        'func' => 'update',
        'title'=> "Edit Pengajuan Proposal Baru",
        'titleButton' => "Simpan"
        ])
@endsection
