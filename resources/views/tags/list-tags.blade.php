@extends('layout')

@section('title', 'Tags')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => 'index.php',
                'name' => 'Home'
            ], [
                'link' => '/./list-categories.php',
                'name' => 'Category List'
            ], [
                'link' => '/',
                'name' => 'Tag List'
            ]
        ]
    ])
@endsection

@section('content')
    <h1>{{ $header }}</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col" colspan="2">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tags as $tag)
        <tr>
            <th scope="row">{{ $tag->id }}</th>
            <td>{{ $tag->title }}</td>
            <td>{{ $tag->slug }}</td>
            <td><a href="/update-tag.php?id={{ $tag->id }}">UPDATE</a></td>
            <td><a href="/delete-tag.php?id={{ $tag->id }}">DELETE</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="create-tag.php"> ADD MORE </a>
    <br>
    <a class="btn btn-secondary mt-3" href="index.php"> Back </a>
@endsection