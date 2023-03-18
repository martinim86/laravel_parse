@extends('layouts.app')

@section('title')
    <?= $page->title ?>
@endsection

@section('content')
<h1>{{ $page->title }}</h1>
<img style="width: 100%;" src="{{ Voyager::image( $page->image ) }}" />
<p>{!! $page->body !!}</p>
@endsection
