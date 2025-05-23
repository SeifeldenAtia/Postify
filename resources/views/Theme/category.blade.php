@extends('Theme.master')
@section('title', $category->name)
@section('category-avtive', 'active')
@section('content')
    @include('Theme.partials.hero', ['title' => $category->name])
    <!--================ Start Blog Post Area =================-->
    <section class="blog-post-area section-margin">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @if (count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <div class="col-md-6" href="{{ route('blogs.show', $blog) }}">
                                    <div class="single-recent-blog-post card-view">
                                        <div class="thumb">
                                            <img class="card-img rounded-0"
                                                src="{{ asset('storage/blogs/' . $blog->image) }}" alt="">
                                            <ul class="thumb-info">
                                                <li><a href="{{ route('blogs.show', $blog) }}"><i
                                                            class="ti-user"></i>{{ $blog->user->name }}</a>
                                                </li>
                                                <li><a href="{{ route('blogs.show', $blog) }}"><i
                                                            class="ti-notepad"></i>{{ $blog->created_at->diffForHumans() }}</a>
                                                </li>
                                                <li><a href="{{ route('blogs.show', $blog) }}"><i
                                                            class="ti-themify-favicon"></i>2 Comments</a></li>


                                            </ul>
                                        </div>
                                        <a class="button" href="{{ route('blogs.show', $blog) }}">Read More <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>





                    {{ $blogs->links('pagination::bootstrap-5') }}


                </div>

                <!-- Start Blog Post Siddebar -->
                @include('Theme.partials.sidebar')
                <!-- End Blog Post Siddebar -->
            </div>
    </section>
    <!--================ End Blog Post Area =================-->
@endsection
