@extends('layouts.main')

@section('content')
    {{-- <x-partials.works.introduction /> --}}
    <x-partials.works.more-works :works="$works" />
    {{-- <x-partials.works.testimonial /> --}}
@endsection
