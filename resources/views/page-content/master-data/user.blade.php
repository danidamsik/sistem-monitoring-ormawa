@extends('app')

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-purple-50 via-pink-50 to-rose-50 px-6 py-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-1 h-8 bg-gradient-to-b from-purple-600 to-pink-600 rounded-full"></div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-800 to-gray-600 bg-clip-text text-transparent">
                    Master Data User
                </h1>
            </div>
            <p class="text-gray-500 ml-6">Kelola data pengguna sistem dengan mudah</p>
        </div>
        <!-- Card Form Input -->
        @livewire('master-data.user.form-user')
        <!-- Card Table -->
        @livewire('master-data.user.table-user')
    </div>
@endsection
