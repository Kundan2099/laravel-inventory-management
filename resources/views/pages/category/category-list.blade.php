@extends('layouts.app')

@section('app-section')
<section>
    <div class="container py-5">

        <div class="mb-5">
            <h3>All Category</h3>
        </div>

        <div class="mb-3">
            <a href="{{route('view.add.list')}}" class="btn btn-primary btn-sm">Add Category</a>
        </div>

        <div>
            <table class="table table-bordered">
                <thead>
                    <th>Id</th>
                    <th>Category Id</th>
                    <th>Name</th>
                    <th>Summary</th>
                    <th>Thumbnail Image</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->category_id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->summary }}</td>
                            <td>{{ $category->thumbnail_image }}</td>
                            <td>
                                <a href="#">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection