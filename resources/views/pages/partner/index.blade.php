@extends('layouts.app')

@section('title', 'Our Partners - LifeEase Travel')

@section('content')
    <section class="partner-section" id="partners">
        <div class="container">
            @include('pages.partner.partials.partner-hero')

            @include('pages.partner.partials.partner-benefits')

            @include('pages.partner.partials.partner-form')
        </div>
    </section>
@endsection
