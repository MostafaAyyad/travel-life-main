@extends('layouts.app')

@section('title', 'About Us - LifeEase Travel')

@section('content')
    <div class="container ">
        @include('pages.about.partials.about-section')

        @include('pages.about.partials.slider')

        @include('pages.about.partials.why-choose-us')

        @include('pages.about.partials.call-to-action')
    </div>
@endsection
