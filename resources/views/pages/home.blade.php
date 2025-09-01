@extends('layouts.main')

@section('content')
    <x-partials.home.introduction />
    {{-- <x-partials.home.about /> --}}
    {{-- <x-partials.home.works /> --}}
    {{-- <x-partials.home.more-works /> --}}
    <x-partials.home.contact />
    <x-partials.home.blogs :media="$media" />
    <x-partials.home.more-blogs :medias="$medias" />
    {{-- <x-partials.home.form-contact /> --}}
@endsection
