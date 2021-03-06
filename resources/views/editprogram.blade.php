<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Styles -->
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">

                <div class='container'>
                    <div class="title m-b-md">
                        <h3>Edit {{$program->name}}</h3>
                    </div>

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            {{ $error }} <br />
                        @endforeach
                    @endif

                    <form method="post" action='{{ route('programs.update') }}'>

                        @csrf

                        <div class="form-group">
                            <label for="inputName">Name of the project</label>
                            <input name='name' id="inputName" class="form-control" value="{{$program->name}}"/>
                        </div>
                        <div class="form-group">
                            <label for="inputDesc">Description</label>
                            <input name='description' id="inputDesc" class="form-control" value="{{$program->description}}"/>
                        </div>
                        <input hidden name='id' value='{{$program->id}}' />

                        <a href="{{route('programs.list')}}" class="btn btn-secondary" role="button" aria-pressed="true">Cancel</a>
                        <button type='submit' class="btn btn-success">Update</button>

                    </form>
                </div>

            </div>
        </div>
    </body>
</html>
