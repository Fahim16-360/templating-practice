@extends('layouts.master')
@section('title','All Books')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Books List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Book List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Books List</h3>
                            @include('layouts._messages')
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Author Name</th>
                                    <th>Publisher</th>
                                    <th>Publishing Year</th>
                                    @if(auth()->user()->role == 'admin')
                                    <th>Action</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($books as $book )
                                    <tr>
                                        <td>{{ $book->title }}</td>
                                        <td>
                                            <img src="{{ asset($book->image) }}" height="80px" width="120px" alt="">
                                        </td>
                                        <td>{{ $book->author }}
                                        </td>
                                        <td>{{ $book->publisher }}</td>
                                        <td> {{ $book->publishing_year }}</td>
                                        @if(auth()->user()->role == 'admin')
                                            <td class="project-actions text-right">

                                            <a class="btn btn-info btn-sm" href="{{ route('book.edit',$book->id) }}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <form style="display: inline-block;" class="d-inline-block" action="{{ route('book.delete',$book->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" onclick="confirm('Do you really want to delete?')" >
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                        @endif
                                    </tr>
                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Author Name</th>
                                    <th>Publisher</th>
                                    <th>Publishing Year</th>
                                    @if(auth()->user()->role == 'admin')
                                    <th>
                                        Action
                                    </th>
                                    @endif
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
