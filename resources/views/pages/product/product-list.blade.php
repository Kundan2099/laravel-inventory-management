@extends('layouts.app')

@section('app-section')
    <section>
        <div class="container py-5">

            <div class="row justify-content-between g-5 mb-3">
                <div class="col-lg-6 col-md-6 col-12">
                    <h4 class="fw-bold">Categories</h4>
                    <p class="small text-secondary">List of all categories in the system</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12 text-end">
                    <a href="{{ route('view.add.product') }}" class="btn btn-primary">Add Category</a>
                </div>
            </div>

            <div>
                <table class="table table-bordered data-table table-hover align-middle">
                    <thead>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Summary</th>
                        <th>Price Original</th>
                        <th>Price Discounted</th>
                        <th>Availability</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->child_category_id }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->summary }}</td>
                                <td>{{ $product->price_original }}</td>
                                <td>{{ $product->price_discounted }}</td>
                                <td>{{ $product->availability }}</td>
                                <td>
                                    @if (!is_null($categoryies->category_id))
                                        {{\App\Models\Category::find($category->category_id)->name }}
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Options
                                        </button>
                                        <ul class="dropdown-menu shadow">
                                            <li><a class="dropdown-item"
                                                    href="{{ route('view.edit.list', ['id' => $category->id]) }}">Edit
                                                    Category</a></li>
                                            <li><a class="dropdown-item text-danger" onclick="return confirm('Are you sure to delete this category ?')" 
                                                    href="{{ route('delete.category', ['id' => $category->id]) }}">Delete
                                                    Category</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>

        </div>
    </section>
@endsection
