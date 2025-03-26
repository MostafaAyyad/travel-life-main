@extends('layouts.app')

@section('title', 'Request a Service - LifeEase Travel')

@section('content')

    @include('pages.request-service.partials.request-hero')

    @include('pages.request-service.partials.request-form')

    @include('pages.request-service.partials.clients-section')

    @include('pages.request-service.partials.contact-section')

@endsection
