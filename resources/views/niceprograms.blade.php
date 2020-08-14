@extends('programs')
@section('content')
    <div class="container-fluid">
        <div class="list-group">
            @foreach($programs as $program)
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $program->name }}</h5>
                        <small class="text-muted">{{$program->id}}</small>
                    </div>
                    <p class="mb-1">{{$program->desc}}</p>
                    <small class="text-muted">Donec id elit non mi porta.</small>
                </a>
            @endforeach
        </div>
    </div>
@stop
