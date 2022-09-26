@extends('layout')

@section('title', 'Tags')

@section('breadcrumbs')
    @include('particials.breadcrumbs', [
        'links'=> [
            [
                'link' => '/category',
                'name' => 'Category List'
            ], [
                'link' => '/',
                'name' => 'Tag List'
            ]
        ]
    ])
@endsection

@section('content')
    <h1>Tag List</h1>
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
        @forelse ($tags as $tag)
            <tr>
                <th scope="row">{{ $tag->id }}</th>
                <td>{{ $tag->title }}</td>
                <td>{{ $tag->slug }}</td>
                <td><a href="/tag/{{ $tag->id }}/edit">UPDATE</a></td>
                <td><a href="/tag/{{ $tag->id }}/delete">DELETE</a></td>
                <td><a href="/tag/{{ $tag->id }}/show">SHOW</a></td>
            </tr>
        @empty
            <p>Empty</p>
        @endforelse
        </tbody>
    </table>
    <a class="btn btn-primary" href="/tag/create"> ADD MORE </a>
    <br>
    <a class="btn btn-secondary mt-3" href="/tag"> Back </a>
@endsection