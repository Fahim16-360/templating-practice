@extends('layouts.master')
@section('title','Update a Book Info')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Book Edit Form</h1>
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
                            <h3 class="card-title">Update Book Info</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('book.update',$book->id) }}" method="post">
                            @csrf
                            @method('put')
{{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}" >--}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Book Title</label>
                                    <input name="title" value="{{ $book->title }}" type="text" class="form-control" id="title" placeholder="Enter book titile">
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                               <div class="form-group">
                                    <label for="author">Book Author</label>
                                    <input name="author" value="{{ $book->author }}" type="text" class="form-control" id="author" placeholder="Enter author name">
                               @error('author')
                                   {{ $message }}
                                   @enderror
                                </div>
                               <div class="form-group">
                                    <label for="publisher">Book Publisher</label>
                                    <input value="{{ $book->publisher }}" name="publisher" type="text" class="form-control" id="publisher" placeholder="Enter author name">
                                </div>
                               <div class="form-group">
                                    <label for="publishing_year">Book Publishing Year</label>
                                    <input value="{{ $book->publishing_year }}" name="publishing_year" type="text" class="form-control" id="publishing_year" placeholder="Enter author name">
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
