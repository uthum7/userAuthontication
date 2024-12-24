@extends("layouts.default")
@section("title", "RegisterDetails")
@section("content")
<div class="container d-flex justify-content-center my-5">
    <div class="table-responsive" style="max-width: 1200px;">
        <table class="table table-striped table-bordered text-center">
            <caption class="text-center fs-4 fw-bold mb-3">User Details</caption>
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Full Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->password }}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-primary btn-sm me-2" href="{{ route('edit', $user->id) }}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('delete', $user->id) }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
