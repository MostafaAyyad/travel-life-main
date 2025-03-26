@extends('layouts.app')

@section('title', 'LifeEase Travel | Home')

@section('content')
    {{-- Header --}}
    @include('pages.home.partials.header')
    {{-- Content Page --}}
    @include('pages.home.partials.booking-tabs')
    @include('pages.home.partials.booking-cards')
    @include('pages.home.partials.travel-deals')
    @include('pages.home.partials.trip-highlights')
    @include('pages.home.partials.partnership-logos')
    @include('pages.home.partials.car-rentals')
    @include('pages.home.partials.photo-showcase')
    @include('pages.home.partials.luxury-experiences')
    @include('pages.home.partials.about-us')
    @include('pages.home.partials.round-trip')
    @include('pages.home.partials.customer-feedback')
@endsection
