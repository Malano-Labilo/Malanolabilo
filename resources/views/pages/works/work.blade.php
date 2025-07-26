@extends('layouts.main')

@section('content')
    <x-partials.works.detail-work :work="$work" />
@endsection
