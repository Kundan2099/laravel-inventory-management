@extends('layouts.app')

@section('app-section')
    <section>
        <div class="container py-5">
            <div class="mb-5">
                <h3>Add Category</h3>
            </div>

            <div class="mb-3">
                <a href="{{ route('view.category.list') }}" class="btn btn-primary btn-sm">Back</a>
            </div>

            <form action="{{ route('store.category') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control" value="{{ old('category_id') }}">
                        <option value="">Select Category</option>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}"> {{ $item->name }} </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                        placeholder="Enter Category Name">
                    @error('name')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="summary">Summary</label>
                    <input type="text" name="summary" class="form-control" value="{{ old('summary') }}"
                        placeholder="Enter Category Summary">
                    @error('summary')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="thumbnail_image">Thumbnail Image</label>
                    <input type="file" name="thumbnail_image" class="form-control" value="{{ old('thumbnail_image') }}"
                        placeholder="Enter Category Image">
                    @error('thumbnail_image')
                        <span class="small text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary byn-sm">Add Category</button>
                </div>

            </form>
        </div>
    </section>
@endsection
