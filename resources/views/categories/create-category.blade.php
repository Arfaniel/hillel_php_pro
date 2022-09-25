@extends('layout')

@section('title', 'New category')

@section('content')
    <h1>New category</h1>
    <form action="" method="POST">
        <label for="name">Category name</label>
        <input type="text" name="category_name" id="name" value="">
        <br>
        <br>
        <label for="score">Category slug</label>
        <input type="text" name="category_slug" id="slug" value="">
        <br>
        <br>
        <input type="submit">
    </form>
@endsection