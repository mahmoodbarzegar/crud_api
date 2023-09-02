@extends('layout')

@section('content')
    <div class="container ">
    <div class="row ">


    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">نام دوره</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
    </div>
@endsection
