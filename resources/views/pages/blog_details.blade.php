
@extends('home')

@section('main_content')

    <div id="templatemo_content">

            <div class="post_section">

                <div class="post_date">
                    30<span>Nov</span>
                </div>
                <div class="post_content">

                    <h2><a href="">{{$blog_info->blog_title}}</a></h2>

                    <strong>Author:  {{$blog_info->author_name}}</strong>  | <strong>Category: {{$blog_info->category_id}}</strong> <a href=""></a>, <a href="#">Templates</a>
                    @if($blog_info->blog_image)
                        <a href="" target="_parent"><img src="{{asset($blog_info->blog_image)}}" width="500" height="300" alt="image"/></a>
                    @endif
                    <p>{{$blog_info->blog_short_description}} </p>
                    <p>{{$blog_info->blog_long_description}} </p>
                    <p>This article read {{$blog_info->hit_counter}} times</a>                </p>
                </div>
                <div class="cleaner"></div>
            </div>

    </div>


@endsection