@extends('backend.layout')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white">
        <h5 class="mb-0">Edit Category</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control">{{ $category->description }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Current Image</label>
                @if($category->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}" width="150" class="rounded">
                </div>
                @endif
                <input type="file" name="image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Category</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
