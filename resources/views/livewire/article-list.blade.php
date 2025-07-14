@extends('layouts.app')

@section('content')
        <article-list :articles="{{json_encode($articles)}}"></article-list> 
@endsection

