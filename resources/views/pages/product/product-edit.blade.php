@extends('layouts.app')

@section('app-section')
    <section>
        <div class="container py-5">

            <div class="mb-5">
                <a href="{{ route('view.product.list') }}" class="btn btn-primary"><i data-feather="arrow-left"></i> Back to Products</a>
            </div>

            <div class="mb-3">
                <h4 class="fw-bold">Edit Product</h4>
                <p class="small text-secondary">Please fill the required fields</p>
            </div>

            {{-- <form action="{{ route('edit.category', ['id' => $category->id]) }} " method="POST" enctype="multipart/form-data"> --}}
                <form action="#" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $category->name) }}"
                            placeholder="Enter Category Name">
                        @error('name')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="category_id" class="form-label">Category <span class="text-secondary">(Optional)</span></label>
                        <select name="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option @selected(old('category_id', $category->category_id)) value="{{ $item->id }}"> {{ $item->name }} </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="summary" class="form-label">Summary <span class="text-secondary">(Optional)</span></label>
                        <input type="text" name="summary" class="form-control" value="{{ old('summary', $category->summary) }}"
                            placeholder="Enter Category Summary">
                        @error('summary')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="thumbnail_image" class="form-label">Thumbnail Image <span class="text-secondary">(Optional)</span></label>
                        <input type="file" name="thumbnail_image" class="form-control"
                            value="{{ old('thumbnail_image') }}" placeholder="Enter Category Image">
                        @error('thumbnail_image')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                </div>

            </form>
        </div>
    </section>
@endsection
