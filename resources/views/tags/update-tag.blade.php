@extends('layout')

@section('title')
    {{ $tag->title }}
@endsection


@section('content')
    <h1>Editing tag</h1>
    <form action="" method="POST">
        <label for="name">Tag name</label>
        <input type="text" name="tag_name" id="name" value="{{ $tag->title }}">
        <br>
        <br>
        <label for="score">Tag slug</label>
        <input type="text" name="tag_slug" id="slug" value="{{ $tag->slug }}">
        <br>
        <br>
        <input type="submit">
    </form>
@endsection