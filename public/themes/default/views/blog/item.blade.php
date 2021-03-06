          <article class="blog-post">
              <header>
              <div class="row item-top">
                <div class="col-sm-12">
                <h1 class="blog-post-title"><a href="/blog/{{substr($result->created_at, 0, 4)}}/{{substr($result->created_at, 5, 2)}}/{{substr($result->created_at, 8, 2)}}/{{$result->slug}}">{{$result->post_title}}</a></h1>
                <div class="blog-post-meta">
                    <p>
                    {{date_links([substr($result->created_at, 0, 4), substr($result->created_at, 5, 2), substr($result->created_at, 8, 2)])}}
                    @if ($result->modified_at !== '1000-01-01 00:00:00')
                    <span class="edit-time">(edited {{format_time($result->modified_at)}})</span>
                    @endif
                </p>
                <p>
                on <a href="/blog/category/{{slugify($result->category)}}" >{{$result->category}}</a> in <a href="/blog/language/{{strtolower(slugify($result->language))}}" >{{ucfirst($result->language)}}</a>
                </p>
                <p>
                {{read_time($result->post_id, true, true)}} read
                </p>
                </div>
            </div>
            </header>

            <section class="blog-body">
                <?=get_intro($result->post_id);?>
            </section>

            <section class="post-bottom">
                <div class="col-sm-12">
                <a class="btn btn-primary read-more" href="/blog/{{substr($result->created_at, 0, 4)}}/{{substr($result->created_at, 5, 2)}}/{{substr($result->created_at, 8, 2)}}/{{$result->slug}}">Read more</a>
                </div>
            </section>
          </article><!-- /.blog-post -->
