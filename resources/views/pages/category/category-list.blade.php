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
            </table>
        </div>

    </div>
</section>
@endsection