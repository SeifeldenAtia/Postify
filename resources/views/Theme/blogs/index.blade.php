@extends('Theme.master')
@section('title', 'My Blogs')
@section('content')
    @include('Theme.partials.hero', ['title' => ' My Blogs'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogCreateStatus'))
                        <div class="alert alert-success">
                            {{ session('blogCreateStatus') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-between mb-3">
                        <h2><b>My Blogs</b></h2>
                        <a href="{{ route('blogs.create') }}" class="btn btn-primary" target="_blank">Create
                            New
                            Blog</a>
                    </div>

                    @if (session('blogCreateStatus'))
                        <div class="alert alert-success">
                            {{ session('blogCreateStatus') }}
                        </div>
                    @endif
                    @if (session('blogDeleteStatus'))
                        <div class="alert alert-danger">
                            {{ session('blogDeleteStatus') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($blogs) > 0)
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $blog->name }}</td>
                                        <td>{{ $blog->description }}</td>
                                        <td><img src="{{ asset('storage/blogs/' . $blog->image) }}" width="50px"
                                                height="50px">
                                        </td>
                                        <td class="d-flex justify-content-around">
                                            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-success mx-2">Edit</a>
                                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-2">Delete</button>
                                            </form>
                                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-info mx-2"
                                                target="_blank">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center">No Blogs available</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $blogs->links('pagination::bootstrap-5') }}
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
