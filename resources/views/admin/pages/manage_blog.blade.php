@extends('admin.admin_master')
@section('manage')




    <!-- BEGIN EDITABLE TABLE widget-->
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE widget-->
            <div class="widget purple">
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> Editable Table</h4>
                    <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                </div>
                <div class="widget-body">
                    <div>
                        <div class="clearfix">
                            <div class="btn-group">
                                <button id="editable-sample_new" class="btn green">
                                    Add New <i class="icon-plus"></i>
                                </button>
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="space15"></div>
                        <table class="table table-striped table-hover table-bordered" id="editable-sample">
                            <thead>
                            <tr>
                                <th>Blog ID</th>
                                <th>Blog Name</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_blog as $v_blog)
                                <tr class="">
                                    <td>{{$v_blog->id}}</td>
                                    <td>{{$v_blog->blog_title}}</td>
                                    <td>
                                        @if($v_blog->publication_status==1)
                                            Published
                                        @else
                                            Unpublished
                                        @endif
                                    </td>

                                    <td>
                                    <td class="center">
                                        @if($v_blog->publication_status==1)
                                            <a href="{{URL::to('unpublish-category/'.$v_blog->id)}}" class="btn btn-danger"><i class="icon-thumbs-down"></i></a>
                                        @else
                                            <a href="{{URL::to('publish-category/'.$v_blog->id)}}" class="btn btn-success"><i class="icon-thumbs-up"></i></a>
                                        @endif
                                        <a href="{{URL::to('edit-blog/'.$v_blog->id)}}" class="btn btn-primary"><i class="icon-pencil"></i></a>
                                        @if(Session::get('access_label')==2)
                                            <a href="{{URL::to('delete-blog/'.$v_blog->id)}}" onclick="return checkDelete()" class="btn btn-danger"><i class="icon-trash"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END EXAMPLE TABLE widget-->
        </div>
    </div>

    <!-- END PAGE -->

    <tr class="">
        <td>Jondi Rose</td>
        <td>Alfred Jondi Rose</td>
        <td>1234</td>
        <td class="center">super user</td>
        <td><a class="edit" href="javascript:;">Edit</a></td>
        <td><a class="delete" href="javascript:;">Delete</a></td>
    </tr>

    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!-- END EXAMPLE TABLE widget-->
    </div>
    </div>

    <!-- END PAGE -->
@endsection