@extends('admin.admin_master')

@section('content')


    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="widget green">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> Advanced form Validation</h4>
                    <div class="tools">
                        <a href="javascript:;" class="collapse"></a>
                        <a href="#portlet-config" data-toggle="modal" class="config"></a>
                        <a href="javascript:;" class="reload"></a>
                        <a href="javascript:;" class="remove"></a>
                    </div>
                </div>
                <div class="widget-body form">

                    <h3 style="color: lawngreen">
                        <?php
                        $message=Session::get('message');
                        if ($message){
                            echo $message;
                            Session::put('message','');
                        }

                        ?>
                    </h3>




                    <!-- BEGIN FORM-->

                    {{--{!! Form::open(['url' => '/save-category','method'=>'post', 'class'=>'cmxform form-horizontal', 'id'=>'signupForm']) !!}--}}
                    {{--{{csrf_field()}}--}}
                    {!! Form::open(['url'=> '/update-blog','method'=>'post', 'enctype'=>'multipart/form-data' ,'name'=>'edit-blog' ,'class'=>'cmxform form-horizontal', 'id'=>'signupForm']) !!}
                    <div class="control-group ">
                        <label for="firstname" class="control-label">Blog Title</label>
                        <div class="controls">
                            <input class="span6 " id="firstname" value="{{$blog_info->blog_title}}" name="blog_title" type="text" />
                            <input class="span6 " id="firstname" value="{{$blog_info->id}}" name="blog_id" type="hidden" />
                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="lastname" class="control-label">Category Name</label>
                        <div class="controls">
                            <select class="span6 " data-placeholder="Choose a Category" tabindex="-1" id="category_id" name="category_id" >
                                <option value="">Select Category</option>
                                @foreach($category_info as $v_category)
                                    <option value="{{$v_category->id}}">{{$v_category->category_name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="lastname"  class="control-label">Blog Short Description</label>
                        <div class="controls">
                            <textarea class="span6 " value="" id="lastname" name="short_description">{{$blog_info->blog_short_description}}</textarea>

                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="lastname"  class="control-label">Blog Long Description</label>
                        <div class="controls">
                            <textarea class="span6 " value="" id="lastname" name="long_description">{{$blog_info->blog_long_description}}</textarea>

                        </div>
                    </div>
                    <div class="control-group ">
                        <label for="firstname" class="control-label">Image</label>
                            <div class="controls">
                                <input type="file" name="image"/><span><img src="{{asset($blog_info->blog_image)}}" width="50" height ="50"/> </span>
                                <input type="hidden" name="blog_old_image" value="{{$blog_info->blog_image}}"/>
                            </div>
                    </div>
                    <div class="control-group ">
                        <label for="lastname" class="control-label">Category Status</label>
                        <div class="controls">
                            <select class="span6 " data-placeholder="Choose a Category" tabindex="-1" id="selXZ1" name="status" >
                                <option value="">Select Status</option>
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-success" type="submit">Update</button>
                        <button class="btn" type="button">Cancel</button>
                    </div>
                {!! Form::close() !!}
                <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
    <script type="text/javascript">

        document.forms['edit-blog'].elements['status'].value='<?php echo $blog_info->publication_status ?>' ;
        document.forms['edit-blog'].elements['category_id'].value='<?php echo $blog_info->category_id ?>' ;
    </script>
@stop