@extends('layouts.app')
@section('title', 'Update Promotional Slider')

@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add Promotional Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Add Promotional Slider</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    @include('includes.message')

                    <h4 class="card-title mb-4">Promotional Slider Info</h4>

                    <form action="/admin/promotional-slider/update" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group row mb-4">
                            <label for="slider_title" class="col-sm-3 col-form-label">Promotional Slider Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="slider_title" name="slider_title" value="{{$result->slider_title}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="promotional_slider_id" value="{{$result->promotional_slider_id}}">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="slider_sub_title" class="col-sm-3 col-form-label">Promotional Slider Sub Title</label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" id="slider_sub_title" name="slider_sub_title">{{$result->slider_sub_title}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="slider_url" class="col-sm-3 col-form-label">Url</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="slider_url" name="slider_url"value="{{$result->slider_url}}">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="image" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>


                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

@stop
