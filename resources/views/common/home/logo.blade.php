<!--  logo section -->
<section class="section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="slide-6 no-arrow">

                    @foreach(getShops() as $shop)

                        <div>
                            <div class="logo-block">
                                <a href="/shop/{{$shop->shop_id}}/{{$shop->shop_name}}">
                                    <img src="{{$shop->shop_image}}" alt="" style="max-height: 80px"></a>
                            </div>

                            <h4 class="text-center p-t-5"></h4>
                        </div>


                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!--  logo section end-->
