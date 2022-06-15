@extends('layouts.master')
@section('title','Create a Book')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>General Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Quick Example</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data" >
                            @csrf
{{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >--}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Book Title</label>
                                    <input name="title" value="{{ old('title') }}" type="text" class="form-control" id="title" placeholder="Enter book titile">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                               <div class="form-group">
                                    <label for="author">Book Author</label>
                                    <input name="author" value="{{ old('author') }}" type="text" class="form-control" id="author" placeholder="Enter author name">
                               @error('author')
                                   {{ $message }}
                                   @enderror
                                </div>
                               <div class="form-group">
                                    <label for="publisher">Book Publisher</label>
                                    <input name="publisher" type="text" class="form-control" id="publisher" placeholder="Enter author name">
                                </div>
                               <div class="form-group">
                                    <label for="publishing_year">Book Publishing Year</label>
                                    <input name="publishing_year" type="text" class="form-control" id="publishing_year" placeholder="Enter author name">
                                </div>
                                <div class="form-group">
                                    <label for="price">Book Price</label>
                                    <input name="price" type="text" class="form-control" id="price" placeholder="Enter the book price">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Book Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->



                </div>
                <!--/.col (left) -->

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
