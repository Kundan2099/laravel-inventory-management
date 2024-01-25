@extends('layouts.app')

@section('app-section')
    <section>
        <div class="container py-5">

            <div class="mb-5">
                <a href={{ route('view.product.list') }} class="btn btn-primary"><i data-feather="arrow-left"></i> Back to Products</a>
            </div>

            <div class="mb-3">
                <h4 class="fw-bold">Add Product</h4>
                <p class="small text-secondary">Please fill the required fields</p>
            </div>

            <form action="{{route('store.product')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                            placeholder="Enter Product Name">
                        @error('name')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group col-12">
                        <label for="summary" class="form-label">Summary <span class="text-secondary">(Optional)</span></label>
                        <input type="text" name="summary" class="form-control" value="{{ old('summary') }}"
                            placeholder="Enter Product Summary">
                        @error('summary')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="quantity" class="form-label">Quantity <span class="text-secondary">(Optional)</span></label>
                        <input type="integer" name="quantity" class="form-control" value="{{ old('quantity') }}"
                            placeholder="Enter Product Quantity">
                        @error('quantity')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="price_original" class="form-label">Price <span class="text-secondary">(Optional)</span></label>
                        <input type="decimal" name="price_original" class="form-control" value="{{ old('price_original') }}"
                            placeholder="Enter Product Price">
                        @error('price_original')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="price_discounted" class="form-label">Discounted <span class="text-secondary">(Optional)</span></label>
                        <input type="decimal" name="price_discounted" class="form-control" value="{{ old('price_discounted') }}"
                            placeholder="Enter Product Discounted">
                        @error('price_discounted')
                            <span class="small text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group col-12">
                        <label for="availability" class="form-label">Availability <span class="text-secondary">(Optional)</span></label>
                        <input type="text" name="availability" class="form-control" value="{{ old('availability') }}"
                            placeholder="Enter Product Availability">
                        @error('availability')
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
                        <button type="submit" class="btn btn-primary byn-sm">Add Product</button>
                    </div>

                </div>

            </form>
        </div>
    </section>
@endsection
