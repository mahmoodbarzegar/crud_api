@extends('layout')

@section('content')
    <div class="container ">
    <div class="row ">

@foreach($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">نام دوره</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">دسته بندی</label>

            <select class="form-select" aria-label="Default select example" name="category_id">
                <option selected>انتخاب</option>

                @foreach($categories as  $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
            </select>

        </div>
        <div class="mb-3">
            <label for="image" class="form-label">عکس</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        <div class="mb-3">
            <label for="video" class="form-label">ویدیو</label>
            <input type="file" name="video" class="form-control" id="video">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    </div>
    </div>
@endsection
