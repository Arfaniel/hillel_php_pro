@extends('layout')

@section('title', 'Categories')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => 'index.php',
                'name' => 'Home'
            ], [
                'link' => '/',
                'name' => 'Category List'
            ], [
                'link' => '/./list-tags.php',
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
        @foreach ($categories as $category)
        <tr>
            <th scope="row">{{ $category->id }}</th>
            <td>{{ $category->title }}</td>
            <td>{{ $category->slug }}</td>
            <td><a href="/update-category.php?id={{ $category->id }}">UPDATE</a></td>
            <td><a href="/delete-category.php?id={{ $category->id }}">DELETE</a></td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="create-category.php"> ADD MORE </a>
    <br>
    <a class="btn btn-secondary mt-3" href="index.php"> Back </a>
@endsection