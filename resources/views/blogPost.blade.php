@extends('master')

@section('headTitle')
    Blog Post - {{ $blogPost->title }}
@endsection

@section('pageTitle')
    {{ $blogPost->title }}
@endsection

@section('description')
    {{ $blogPost->created_at->format("d/m/Y") }}
@endsection

@section('content')

    {{ $blogPost->content }}

@endsection