@extends('layouts.common')
@section('title', 'Cart')

@section('content')
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-danger success-text"><i class="fa fa-times text-danger" aria-hidden="true"></i>
                     {{--   <h2>thank you</h2>--}}
                        <p>Your order has been cancelled</p>
                      {{--  <p>Invoice Number: {{ Session::get('invoice') }}</p>--}}
                        <a href="/">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop