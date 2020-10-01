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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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


                <div class="col-lg-12">
                    @include('includes.message')



                    <h3>create account</h3>
                    <div class="theme-card">
                        <form class="theme-form" action="/shop/registration-do" method="post">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="email">Name</label>
                                    <input type="text" class="form-control" id="fname" placeholder=" Name" name="name"
                                           required="">
                                    <input type="hidden" class="form-control" id="fname" placeholder=" Name" name="_token" value="{{csrf_token()}}">

                                </div>
                                <div class="col-md-6">
                                    <label for="review">Phone</label>
                                    <input type="text" class="form-control" id="lname" placeholder="Phone"
                                           name="phone" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="email">email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                           required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="review">Password</label>
                                    <input type="password" class="form-control" id="review"
                                           placeholder="Enter your password" name="password" required="">
                                </div>
                                <button type="submit" class="btn btn-solid">create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



@stop