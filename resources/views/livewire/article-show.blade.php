@extends('layouts.app')

@section('content')
<div style="padding: 20px; max-width: 800px; margin: auto;">
    <a href="{{ route('article.index') }}" class="btn btn-primary mb-3">Back to Articles</a>

    <h1>{{ $article['title'] }}</h1>
    @if($article['image'])
        <img src="{{ asset($article['image']) }}" alt="Article image" style="max-width:300px;">
    @else
        <img src="{{ asset('images/placeholder.png') }}" alt="No image" style="max-width:300px;">
    @endif
    <p>{!! nl2br(e($article['text'])) !!}</p>
    <small>Views: {{ $article['view_count'] }}</small>
</div>

@endsection