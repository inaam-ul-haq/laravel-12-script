<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-template="vertical-menu-template-starter" data-style="light" data-assets-path="{{ asset('assets') }}/">

<head>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('storage/settings/fav.png') }}" />

    <title>{{ config('app.name') }} {{ $pageTitle != null ? '- ' . $pageTitle : '' }}</title>

    @include('layouts.auth.styles')

    @stack('auth_styles')
</head>

<body style="background-color: #f1f1f1 !important;">
    {{-- <x-splash-screen /> --}}
