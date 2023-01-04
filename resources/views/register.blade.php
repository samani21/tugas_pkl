<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Login Form - Afrizals Blog</title>
        <link
            rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    @if($errors->any())
                                    @foreach($errors->all() as $err)
                                    <p class="alert alert-danger">{{ $err }}</p>
                                    @endforeach
                                    @endif
                                    <form action="{{ route('register.action') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label>Name <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Username <span class="text-danger">*</span></label>
                                            <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Password <span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Password Confirmation<span class="text-danger">*</span></label>
                                            <input class="form-control" type="password" name="password_confirm" />
                                        </div>
                                        <div class="mb-3">
                                            <label>Level <span class="text-danger">*</span></label>
                                            <input class="form-control" type="level" name="level" value="{{ old('level') }}" />
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-primary">Register</button>
                                            <a class="btn btn-danger" href="{{ route('login') }}">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
 
        </div>
        <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="{{url('assets/js/scripts.js')}}"></script>
    </body>
</html>