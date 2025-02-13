@extends('layout')

@section('title', 'Unverify')
@section('header', 'Unverify Memes')
@section('content')
<div class="container">
    <h1>Unverify</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <form action="{{ route('verification.index') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary">Show Pending</button>
        </form>
        <thead>
            <tr>
                <th>Picture Name</th>
                <th>Description</th>
                <th>Actions</th>
                <th>Download</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedMems as $media)
            <tr>
                <td>{{ $media->Nosaukums }}</td>
                <td>{{ $media->Apraksts }}</td>
                <td>
                    <form action="{{ route('unverification.unverify', $media) }}" method="POST">
                        @csrf
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="unapprove{{ $media->id }}" value="1">
                            <label class="form-check-label" for="unapprove{{ $media->id }}">Unapprove</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </td>
                <td>
                    <a href="{{ asset('storage/' . $media->Fails) }}" download="{{ $media->Fails }}" class="btn btn-primary">Download</a>
                </td>
                <td>{{ $media->kategorija->Nosaukums }}</td>
                <td>
                    <img src="{{ asset('storage/' . $media->Fails) }}" alt="{{ $media->Nosaukums }}" width="100" height="100">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
</html>
@endsection
