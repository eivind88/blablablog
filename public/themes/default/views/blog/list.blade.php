@extends('layouts.blog')

@section('content')

        <div class="col-sm-8 blog-main">

            <ol class="breadcrumb">
              <li><a href="/blog">Blog</a></li>
              @if ($list_title!='')
                <li><a href="/blog/{{strtolower($list_title)}}">{{ucfirst(strtolower($list_title))}}</a></li>
            @endif
            </ol>

            <ul class="list-unstyled inventory">
                @if ($list_title=='Language')
                    @foreach ($results as $language)
                        <li>
                            <h3><a href="/blog/{{strtolower($list_title.'/'.slugify($language->language_title))}}">{{$language->language_title}}</a></h3>
                        </li>
                    @endforeach
                @elseif ($list_title=='Category')
                    @foreach ($results as $category)
                        <li>
                            <h3><a href="/blog/{{strtolower($list_title.'/'.slugify($category->category_title))}}">{{$category->category_title}}</a></h3>
                        </li>
                    @endforeach
                @elseif ($list_title=='Tag')
                    @foreach ($results as $tag)
                        <li>
                            <h3><a href="/blog/{{strtolower($list_title.'/'.slugify($tag->tag_title))}}">{{$tag->tag_title}}</a></h3>
                        </li>
                    @endforeach
                @elseif ($list_title=='Archives')
                    @foreach ($results as $month)
                        <li>
                            <h3><a href="/blog/{{$month['link']}}">{{$month['title']}}</a></h3>
                        </li>
                    @endforeach
                @endif
            </ul>

        </div><!-- /.blog-main -->
        @include('blog.sidebar')

        @include('layouts.pagination')

@stop
