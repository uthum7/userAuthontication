@extends("layouts.default")
@section("title","Register")
@section("content")
<main class="mt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route("register.post") }}">
                            @csrf
                            <!--name Input-->
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Fullname"
                                       id="name" class="form-control" name="fullname"
                                       autofocus>
                                @if ($errors->has('fullname'))
                                    <span class="text-danger">
                                        {{ $errors->first('fullname') }}
                                    </span>
                                @endif
                            </div>

                            <!-- Email Input -->
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email"
                                       id="email" class="form-control" name="email"
                                       required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <!-- Password Input -->
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password"
                                       id="password" class="form-control" name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
