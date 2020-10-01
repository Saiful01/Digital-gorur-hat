@extends('layouts.app')
@section('title', 'Show Product')

@section('content')


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Product Table</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Show Product</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include('includes.message')


                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="card-title">Customer Info <span> <a href="/admin/product/create"
                                                                           class="btn btn-primary btn-sm pull-right float-right">+New</a></span>
                            </h4>
                            <br>
                        </div>


                    </div>


                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                           style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>

                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Regular Price</th>
                            <th>Selling Price</th>
                            <th>Featured</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        @foreach($results as $result)

                            <tr>

                                <td>{{$result->product_name}}</td>
                                <td>{{$result->category_name}}</td>
                                <td>{{$result->regular_price}}</td>
                                <td>{{$result->selling_price}}</td>
                                <td>
                                    @if($result->is_featured==1)
                                        <span class="badge badge-pill badge-info">Yes</span>
                                    @else
                                        <span class="badge badge-pill badge-danger">No</span>

                                    @endif
                                </td>

                                <td>
                                    <div class="btn-group mr-1 mt-2">
                                        <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action <i class="mdi mdi-chevron-down"></i>
                                        </button>
                                        <div class="dropdown-menu" style="">
                                            <a class="dropdown-item" href="/admin/product/edit/{{$result->product_id}}">Edit</a>
                                            <a class="dropdown-item" href="/admin/product/delete/{{$result->product_id}}">Delete</a>
                                            <a class="dropdown-item" href="/admin/product/details/{{$result->product_id}}">Details</a>
                                            <a class="dropdown-item" href="/admin/product/featured/{{$result->product_id}}">Featured</a>
                                        </div>
                                    </div>

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


@stop
