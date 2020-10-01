<!-- collection banner -->
<section class="pb-0 ratio2_1">
    <div class="container">
        <div class="row partition2">
            @foreach($promotions as $promotion)
                <div class="col-md-6">
                    <a href="{{$promotion->slider_url}}">
                        <div class="collection-banner p-right text-center">
                            <div class="img-part">
                                <img src="/images/promotional_slider/{{$promotion->slider_image}}"
                                     class="img-fluid blur-up lazyload bg-img"
                                     alt="">
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- collection banner end -->
