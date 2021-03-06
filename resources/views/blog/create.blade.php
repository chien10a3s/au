@extends('voyager::master')
@section('css')
    <style>
        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height:100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-plus"></i> Thêm blog
    </h1>
@stop

@section('content')
    
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">

                    <div class="panel-heading">
                        <h3 class="panel-title">Thông tin blog</h3>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'blog.store', 'files' => true]) !!}
                            <div class="form-group">
                            	{!! Form::label('title', 'Tiêu đề') !!}
                            	{!! Form::text('title', null, ['class' => 'form-control']) !!}
                            </div>
                            
                            <div class="form-group">
                            	{!! Form::label('body', 'Mô tả') !!}
                            	{!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                            </div>
                            
                            <div class="form-group">
                            	{!! Form::label('featured_image', 'Ảnh') !!}
                            	{!! Form::file('featured_image') !!}
                            </div>
                            
                            <div class="form-group">
                            	{!! Form::label('slug', 'URL') !!}
                            	{!! Form::text('slug', null, ['class' => 'form-control']) !!}
                            </div>
                            
                            <div class="form-group">
                            	{!! Form::label('status', 'Trạng thái') !!}
                            	{!! Form::select('status', array('0' => 'Vô hiệu', '1' => 'Hoạt động'), null, array('class' => 'form-control')) !!}
                            </div>
                            
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Lưu lại</button>
                            </div>
                		{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
@stop