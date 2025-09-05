@extends('layouts.main')

@section('content')
    <x-partials.media.show-all-media :title="$title" :firstTitle="$firstTitle" :medias="$medias" />
@endsection
