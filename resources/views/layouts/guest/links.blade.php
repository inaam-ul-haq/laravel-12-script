<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="author" content="Inaam ul haq">
    <link rel="author" href="https://inaamulhak.com">

    <x-meta-details :meta-detail="$metaDetail" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/fav-icon.jpg') }}" />

    <title>{{ config('app.name') }} {{ $pageTitle != null ? '- ' . $pageTitle : '' }}</title>

    @include('layouts.guest.styles')
    @yield('styles')
</head>

<body class="bg-white">
    {{-- <x-splash-screen /> --}}