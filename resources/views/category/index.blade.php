@extends('layout')

@section('title', 'Categories')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => '/',
                'name' => 'Category List'
            ], [
                'link' => '/tag',
                'name' => 'Tag List'
            ]
        ]
    ])
@endsection

@section('content')
    <h1>Category List</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col" colspan="3">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->title }}</td>
                <td>{{ $category->slug }}</td>
                <td><a href="/category/{{ $category->id }}/edit">UPDATE</a></td>
                <td><a href="/category/{{ $category->id }}/delete">DELETE</a></td>
                <td><a href="/category/{{ $category->id }}/show">SHOW</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-primary" href="/category/create"> ADD MORE </a>
    <br>
    <a class="btn btn-secondary mt-3" href="/category"> Back </a>
@endsection