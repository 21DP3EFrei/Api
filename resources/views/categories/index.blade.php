@extends('categories.layoutCategory')

@section('title', 'Categories')

@section('content')
    <div class="container">
        <h1>Categories</h1>

        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->Nosaukums }}</td>
                        <td>{{ $category->Apraksts }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->K_ID) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('categories.destroy', $category->K_ID) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection