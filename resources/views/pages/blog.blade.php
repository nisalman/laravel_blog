
@extends('home')

@section('main_content')
    <?php
            $all_blog=DB::table('tbl_blog')
                ->where('publication_status','1')
                ->get();
    ?>
<div id="templatemo_content">
            @foreach($all_blog as $v_blog)
            <div class="post_section">
            
                <div class="post_date">
                    30<span>Nov</span>
                </div>
<div class="post_content">
                
                    <h2><a href="{{URL::to('blog-details/'.$v_blog->id)}}">{{$v_blog->blog_title}}</a></h2>

                    <strong>Author:  {{$v_blog->author_name}}</strong>  | <strong>Category: {{$v_blog->category_id}}</strong> <a href=""></a>, <a href="#">Templates</a>
                    @if($v_blog->blog_image)
                     <a href="" target="_parent"><img src="{{asset($v_blog->blog_image)}}" width="500" height="300" alt="image"/></a>
                    @endif
                    <p>{{$v_blog->blog_short_description}} </p>
                    <p><a href="blog_post.html">24 Comments</a> | <a href="{{URL::to('blog-details/'.$v_blog->id)}}">Continue reading...</a>                </p>
</div>
                <div class="cleaner"></div>
            </div>

    @endforeach
        
          </div>
            

 @endsection