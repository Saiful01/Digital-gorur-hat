@extends('layouts.common')
@section('title', 'Cart')

@section('content')
    <section class="section-b-space light-layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text"><i class="fa fa-check-circle" aria-hidden="true"></i>
                        <h2>thank you</h2>
                        <p>Successfully your order is placed</p>
                        <p>Invoice Number: {{ Session::get('payment_track_id') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop