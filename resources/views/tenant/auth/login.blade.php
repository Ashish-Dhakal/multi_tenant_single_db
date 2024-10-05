<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- boostrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">



</head>

<body>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="">{{ $error }}</div>
        @endforeach

    @endif

    {{-- boostrap register form --}}
    <form action="{{ route('tenant.login.store') }}" method="POST">
        @csrf
        <div class="form-group">


        </div>
        <div class="form-group">
            <div class="col-md-6">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email"
                    required>
            </div>

        </div>
        <div class="form-group">
            <div class="col-md-6">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Enter your password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>



</body>

</html>
