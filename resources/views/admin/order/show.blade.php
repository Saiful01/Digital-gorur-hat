@extends('layouts.app')
@section('title', 'Order Show')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-4">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <i class="bx bx-search-alt search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-right">
                                {{--<button type="button"
                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2"><i
                                            class="mdi mdi-plus mr-1"></i> Add New Order
                                </button>--}}
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap">
                            <thead class="thead-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Tracking Number</th>
                                <th>Customer Name</th>
                                <th>Paid Amount</th>
                                <th>Full Payment</th>
                                {{--  <th>Payable Amount</th>--}}
                                <th>Payment Status</th>
                                <th>Delivery Status</th>
                                <th>View Details</th>
                                {{--  <th>Action</th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">&nbsp;</label>
                                        </div>
                                    </td>
                                    <td><a href="javascript: void(0);"
                                           class="text-body font-weight-bold">#{{$result->payment_track_id}}</a>
                                    </td>
                                    <td>{{$result->customer_name}}</td>
                                    <td>
                                        {{$result->paid_amount}}
                                    </td>
                                    <td>
                                        @if($result->is_full_payment)
                                            <span class="badge badge-success">Yes</span>

                                        @else
                                            <span class="badge badge-warning">No</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($result->payment_status)
                                            <span class="badge badge-success">Done</span>

                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($result->delivery_status)
                                            <span class="badge badge-success">Yes</span>

                                        @else
                                            <span class="badge badge-warning">Pending</span>
                                        @endif

                                    </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <a href="/admin/order/details/{{$result->order_invoice}}"
                                           class="btn btn-primary btn-sm btn-rounded"
                                        >
                                            View Details
                                        </a>
                                    </td>
                                    {{-- <!-- Modal -->
                                     <div class="modal fade exampleModal" tabindex="-1" role="dialog"
                                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                     <button type="button" class="close" data-dismiss="modal"
                                                             aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                     </button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <p class="mb-2">Product id: <span
                                                                 class="text-primary">{{$result->order_invoice}}</span>
                                                     </p>
                                                     <p class="mb-4">Billing Name: <span
                                                                 class="text-primary">{{$result->customer_name}}</span>
                                                     </p>

                                                     <div class="table-responsive">
                                                         <table class="table table-centered table-nowrap">
                                                             <thead>
                                                             <tr>
                                                                 <th scope="col">Product</th>
                                                                 <th scope="col">Product Name</th>
                                                                 <th scope="col">Price</th>
                                                             </tr>
                                                             </thead>
                                                             <tbody>
                                                             <tr>
                                                                 @foreach($products as $product)
                                                                     <th scope="row">
                                                                         <div>
                                                                             <img src="{{$products->featured_image}}"
                                                                                  alt="" class="avatar-sm">
                                                                         </div>
                                                                     </th>
                                                                     <td>
                                                                         <div>
                                                                             <h5 class="text-truncate font-size-14">{{$product->product_name}}</h5>
                                                                             <p class="text-muted mb-0">{{$product->selling_price}}
                                                                                 x {{$product->quantity}}</p>
                                                                         </div>
                                                                     </td>
                                                                     <td>{{$product->total_price}}</td>
                                                                 @endforeach
                                                             </tr>

                                                             <tr>
                                                                 <td colspan="2">
                                                                     <h6 class="m-0 text-right">Sub Total:</h6>
                                                                 </td>
                                                                 <td>
                                                                     {{$product->sub_total}}
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td colspan="2">
                                                                     <h6 class="m-0 text-right">Shipping:</h6>
                                                                 </td>
                                                                 <td>
                                                                     {{$product->shipping_cost}}
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td colspan="2">
                                                                     <h6 class="m-0 text-right">Total:</h6>
                                                                 </td>
                                                                 <td>
                                                                     {{$product->sub_total}}
                                                                 </td>
                                                             </tr>
                                                             </tbody>
                                                         </table>
                                                     </div>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                             data-dismiss="modal">Close
                                                     </button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     RAW Paste Data
                                     <!-- Modal -->
                                     <div class="modal fade exampleModal" tabindex="-1" role="dialog"
                                          aria-labelledby="exampleModalLabel" aria-hidden="true">
                                         <div class="modal-dialog modal-dialog-centered" role="document">
                                             <div class="modal-content">
                                                 <div class="modal-header">
                                                     <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                     <button type="button" class="close" data-dismiss="modal"
                                                             aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                     </button>
                                                 </div>
                                                 <div class="modal-body">
                                                     <p class="mb-2">Product id: <span
                                                                 class="text-primary">#SK2540</span></p>
                                                     <p class="mb-4">Billing Name: <span class="text-primary">Neal Matthews</span>
                                                     </p>

                                                     <div class="table-responsive">
                                                         <table class="table table-centered table-nowrap">
                                                             <thead>
                                                             <tr>
                                                                 <th scope="col">Product</th>
                                                                 <th scope="col">Product Name</th>
                                                                 <th scope="col">Price</th>
                                                             </tr>
                                                             </thead>
                                                             <tbody>
                                                             <tr>
                                                                 <th scope="row">
                                                                     <div>
                                                                         <img src="assets/images/product/img-7.png"
                                                                              alt="" class="avatar-sm">
                                                                     </div>
                                                                 </th>
                                                                 <td>
                                                                     <div>
                                                                         <h5 class="text-truncate font-size-14">Wireless
                                                                             Headphone (Black)</h5>
                                                                         <p class="text-muted mb-0">$ 225 x 1</p>
                                                                     </div>
                                                                 </td>
                                                                 <td>$ 255</td>
                                                             </tr>
                                                             <tr>
                                                                 <th scope="row">
                                                                     <div>
                                                                         <img src="assets/images/product/img-4.png"
                                                                              alt="" class="avatar-sm">
                                                                     </div>
                                                                 </th>
                                                                 <td>
                                                                     <div>
                                                                         <h5 class="text-truncate font-size-14">Hoodie
                                                                             (Blue)</h5>
                                                                         <p class="text-muted mb-0">$ 145 x 1</p>
                                                                     </div>
                                                                 </td>
                                                                 <td>$ 145</td>
                                                             </tr>
                                                             <tr>
                                                                 <td colspan="2">
                                                                     <h6 class="m-0 text-right">Sub Total:</h6>
                                                                 </td>
                                                                 <td>
                                                                     $ 400
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td colspan="2">
                                                                     <h6 class="m-0 text-right">Shipping:</h6>
                                                                 </td>
                                                                 <td>
                                                                     Free
                                                                 </td>
                                                             </tr>
                                                             <tr>
                                                                 <td colspan="2">
                                                                     <h6 class="m-0 text-right">Total:</h6>
                                                                 </td>
                                                                 <td>
                                                                     $ 400
                                                                 </td>
                                                             </tr>
                                                             </tbody>
                                                         </table>
                                                     </div>
                                                 </div>
                                                 <div class="modal-footer">
                                                     <button type="button" class="btn btn-secondary"
                                                             data-dismiss="modal">Close
                                                     </button>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>--}}


                                </tr>
                            @endforeach
                            {{$results->links()}}

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@stop
