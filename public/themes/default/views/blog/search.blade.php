@extends('layouts.blog')

@section('content')

        <section class="col-sm-8 blog-main blog-inventory">

            <ol class="breadcrumb">
                <li><a href="/blog">Blog</a></li>
                <li><a href="/blog/search/">Search</a></li>
                <li class="active">{{$query}}</li>
            </ol>

            @foreach ($results as $result)
                @include('blog.item')
            @endforeach

            @if (count($results) === 0)
                <h2>No results</h2>
            @endif

            @include('layouts.pagination')

        </section><!-- /.blog-main -->
        @include('blog.sidebar')
@stop
