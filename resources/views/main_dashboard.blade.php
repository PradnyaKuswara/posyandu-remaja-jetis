@extends('layouts/dashboard')

@section('title-page')
    Dashboard Utama
@endsection

@section('content')
    <h2>Selamat datang {{ $user->email }}</h2>
@endsection
