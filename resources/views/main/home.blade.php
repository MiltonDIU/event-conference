@extends('layouts.main')

@section('content')
@include('main.sections.intro')

<main id="main">
  @include('main.sections.about')

  @include('main.sections.speakers')

  @include('main.sections.schedule')

  @include('main.sections.venues')

  @include('main.sections.hotels')

  @include('main.sections.gallery')

  @include('main.sections.sponsors')

  @include('main.sections.faq')

  @include('main.sections.subscribe')

  @include('main.sections.buy_ticket')

  @include('main.sections.contact')
</main>
@endsection
