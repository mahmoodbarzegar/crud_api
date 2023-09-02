@extends('layout')

@section('content')
    <div class="container ">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 ">
            @foreach($courses as $course)
            <div class="col">
                <div class="card shadow-sm ">

                    <div class="card-body">
                        <img src="{{ $course->getImagePath() }}" alt="" width="150">
                        <p class="card-text">
                            {{ $course->name }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                            <span>
                                دسته بندی:
                                <span>{{ $course->category->name }}</span>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
