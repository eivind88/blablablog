@extends('layouts.blog')

@section('content')

        <div class="col-sm-8 blog-main">

            <ol class="breadcrumb">
              <li><a href="/blog">Blog</a></li>
              <?php
              if ($list_title!=''){
              echo '<li><a href="/blog/'.strtolower($list_title).'">'.ucfirst(strtolower($list_title)).'</a></li>';
            }
            ?>
            </ol>

            <ul class="list-unstyled inventory">
                <?php
                if ($list_title=='Language')
                {
                    foreach ($results as $language) {
                        ?>
                        <li>
                            <p><a href="/blog/<?=strtolower($list_title.'/'.$language->language_title)?>"><?=$language->language_title?></a></p>
                        </li>
                        <?php
                    }
                }
                elseif ($list_title=='Category')
                {
                    foreach ($results as $category) {
                        ?>
                        <li>
                            <p><a href="/blog/<?=strtolower($list_title.'/'.$category->category_title)?>"><?=$category->category_title?></a></p>
                        </li>
                        <?php
                    }
                }
                elseif ($list_title=='Tag')
                {
                    foreach ($results as $tag) {
                        ?>
                        <li>
                            <p><a href="/blog/<?=strtolower($list_title.'/'.$tag->tag_title)?>"><?=$tag->tag_title?></a></p>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>

        @include('layouts.pagination')

        </div><!-- /.blog-main -->
@stop