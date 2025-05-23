@extends('Theme.master')
@section('title', 'Edit Blog')
@section('content')
    @include('Theme.partials.hero', ['title' => 'Edit "' . $blog->name . '"'])

    <!-- ================ contact section start ================= -->
    <section class="section-margin--small section-margin">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if (session('blogUpdateStatus'))
                        <div class="alert alert-success">
                            {{ session('blogUpdateStatus') }}
                        </div>
                    @endif
                    <form action="{{ route('blogs.update', $blog) }}" method="post" novalidate="novalidate"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group">
                            <input class="form-control border" name="name" type="text" placeholder="Enter your Title"
                                value="{{ $blog->name }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <input class="form-control border mb-3" name="image" type="file">
                            <img src="{{ asset('storage/blogs/' . $blog->image) }}" width="100px" height="100px">
                            <p>Current Image</p>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <select class="form-control border" name="category_id">
                                <option value="" disabled selected>Select category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $blog->category_id) selected @endif>{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>

                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="form-group mb-3">
                            <textarea class="w-100 border" name="description" id="description" rows="5" placeholder="Enter your description">{{ $blog->description }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>



                        <div class="form-group text-center text-md-right
                            mt-3">
                            <button type="submit" class="button button--active button-contactForm">Edit Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
