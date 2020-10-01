@extends('layouts.common')
@section('title', 'Registration')

@section('content')
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>create account</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#l">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">create account</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="register-page section-b-space">
        <div class="container">
            <div class="row">


                <div class="col-lg-7 mx-auto">

                    <h3>create account</h3>
                    <div class="theme-card">
                        <form class="theme-form" action="/otp-verify" method="post">

                            <div class="form-row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="otp" placeholder="OTP" name="otp"
                                           required="">

                                    <input type="hidden" class="form-control" id="fname" placeholder="" name="_token"
                                           value="{{csrf_token()}}">
                                    <button type="submit" class="btn btn-solid">Verify</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@stop