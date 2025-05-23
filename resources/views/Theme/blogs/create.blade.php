@extends('Theme.master')
@section('title', 'Add Blog')
@section('content')
    @include('Theme.partials.hero', ['title' => ' Add Blog'])

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
                    <form action="{{ route('blogs.store') }}" method="post" novalidate="novalidate"
                        enctype="multipart/form-data">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @csrf


                        <div class="form-group">
                            <input class="form-control border" name="name" type="text" placeholder="Enter your Title"
                                value="{{ old('name') }}">
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <input class="form-control border" name="image" type="file">
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="form-group">
                            <select class="form-control border" name="category_id">
                                <option value="" disabled selected>Select category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>

                            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                        </div>

                        <div class="form-group mb-3">
                            <textarea class="w-100 border" name="description" id="description" rows="5" placeholder="Enter your description">{{ old('description') }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>



                        <div class="form-group text-center text-md-right
                            mt-3">
                            <button type="submit" class="button button--active button-contactForm">Create New Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ contact section end ================= -->

@endsection
