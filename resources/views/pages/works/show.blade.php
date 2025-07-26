@extends('layouts.main')

@section('content')
    <x-partials.works.show-works :show="$show" :title="$title" :firstTitle="$firstTitle" />
@endsection
