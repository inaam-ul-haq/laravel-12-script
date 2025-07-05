<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-starter" data-style="light" data-assets-path="{{ asset('assets') }}/">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/fav-icon.jpg') }}" />

    <title>{{ config('app.name') }} {{ $pageTitle != null ? '- ' . $pageTitle : '' }}</title>

    @include('layouts.guest.styles')
    @yield('styles')
</head>

<body class="body_theme1">
    {{-- <x-splash-screen /> --}}
