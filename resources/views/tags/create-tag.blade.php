@extends('layout')

@section('title', 'New tag')

@section('content')
    <h1>New tag</h1>
    <form action="" method="POST">
        <label for="name">Tag name</label>
        <input type="text" name="tag_name" id="name" value="">
        <br>
        <br>
        <label for="score">Tag slug</label>
        <input type="text" name="tag_slug" id="slug" value="">
        <br>
        <br>
        <input type="submit">
    </form>
@endsection