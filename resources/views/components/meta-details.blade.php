@php
$seo = optional($metaDetail->meta_detail);
$robots = [];
if($seo->noindex) $robots[] = 'noindex';
if($seo->nofollow) $robots[] = 'nofollow';
@endphp

<meta name="description" content="{{ $seo->meta_description }}">
<meta name="keywords" content="{{ $seo->meta_keywords }}">
<link rel="canonical" href="{{ $seo->canonical_url ?? $setting->url }}">

<meta property="og:title" content="{{ $seo->og_title ?? $setting->name }}">
<meta property="og:description" content="{{ $seo->og_description }}">
<meta property="og:type" content="{{ $seo->og_type ?? 'website' }}">
<meta property="og:image" content="{{ url($seo->og_image ?? 'settings/logo.png') }}">

<meta name="twitter:title" content="{{ $seo->twitter_title }}">
<meta name="twitter:description" content="{{ $seo->twitter_description }}">
<meta name="twitter:card" content="{{ $seo->twitter_card }}">
<meta name="twitter:image" content="{{ url($seo->twitter_image ?? 'settings/logo.png') }}">

@if(!empty($robots))
<meta name="robots" content="{{ implode(', ', $robots) }}">
@endif

@foreach(optional($metaDetail)->installed_languages as $locale)
<link rel="alternate" hreflang="{{ $locale }}"
    href="{{ LaravelLocalization::getLocalizedURL($locale, null, [], true) }}">
@endforeach
<link rel="alternate" hreflang="x-default" href="{{ $setting->url }}">