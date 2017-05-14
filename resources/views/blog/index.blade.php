@extends('layouts.main_app')
@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="content-grids">
                <div class="col-md-8 content-main">
                    <div class="content-grid">
                        <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
                        <hr>
                            @forelse ($posts as $post)
                            <div class="content-grid-info">
                                <img src="images/post1.jpg" alt=""/>
                                <div class="post-info">
                                    <h4>
                                        {!!
                                            link_to_route('frontend.posts.show', $post->title, ['slug' => $post->slug]).
                                            $post->created_at->format('M jS Y') . "/ 0 Comments"
                                        !!}
                                    </h4>
                                    <p>
                                        {{ str_limit($post->content) }}
                                    </p>
                                    <a href="{{URL::route('frontend.posts.show', ['slug' => $post->slug])}}">
                                        <span></span>READ MORE
                                    </a>
                                        {{--<a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>--}}
                                        {{--<em>({{ $post->created_at->format('M jS Y g:ia') }})</em>--}}
                                        {{--<p>--}}
                                            {{--{{ str_limit($post->content) }}--}}
                                        {{--</p>--}}
                                        {{--<a href="/blog/{{ $post->slug }}"><span></span>READ MORE</a>--}}
                                </div>
                            </div>
                        @empty
                            <div class="content-grid">
                                <p>We don`t have any posts.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-4 content-right">
                    <div class="recent">
                        <h3>RECENT POSTS</h3>
                        <ul>
                            <li><a href="#">Aliquam tincidunt mauris</a></li>
                            <li><a href="#">Vestibulum auctor dapibus  lipsum</a></li>
                            <li><a href="#">Nunc dignissim risus consecu</a></li>
                            <li><a href="#">Cras ornare tristiqu</a></li>
                        </ul>
                    </div>
                    <div class="comments">
                        <h3>RECENT COMMENTS</h3>
                        <ul>
                            <li><a href="#">Amada Doe </a> on <a href="#">Hello World!</a></li>
                            <li><a href="#">Peter Doe </a> on <a href="#"> Photography</a></li>
                            <li><a href="#">Steve Roberts  </a> on <a href="#">HTML5/CSS3</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="archives">
                        <h3>ARCHIVES</h3>
                        <ul>
                            <li><a href="#">October 2013</a></li>
                            <li><a href="#">September 2013</a></li>
                            <li><a href="#">August 2013</a></li>
                            <li><a href="#">July 2013</a></li>
                        </ul>
                    </div>
                    <div class="categories">
                        <h3>CATEGORIES</h3>
                        <ul>
                            <li><a href="#">Vivamus vestibulum nulla</a></li>
                            <li><a href="#">Integer vitae libero ac risus e</a></li>
                            <li><a href="#">Vestibulum commo</a></li>
                            <li><a href="#">Cras iaculis ultricies</a></li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <hr>
                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@endsection
