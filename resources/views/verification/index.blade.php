@extends('layout')

@section('title', 'Verification')
@section('header', 'Verify')
@section('content')
<div class="container">
    <h1>Verify</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('unverification.index') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Show Approved</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Picture Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
                <th>Download</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unverifiedMems as $media)
            <tr>
                <td>{{ $media->Nosaukums }}</td>
                <td>{{ $media->Apraksts }}</td>
                <td>{{ $media->Status == 0 ? 'Pending' : ($media->Status == 1 ? 'Approved' : 'Rejected') }}</td>
                <td>
                    <form action="{{ route('verification.verify', $media) }}" method="POST" class="d-flex align-items-center me-3">
                        @csrf
                        @method('POST') 
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="approve{{ $media->id }}" value="1">
                            <label class="form-check-label" for="approve{{ $media->id }}">
                                {{ $media->Status == 0 ? 'Approve' : 'Re-Approve' }}
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="reject{{ $media->id }}" value="0">
                            <label class="form-check-label" for="reject{{ $media->id }}">Reject</label>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Submit</button>
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
