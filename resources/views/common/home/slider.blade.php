<!-- Home slider -->
<section class="p-0">
    <div class="slide-1 home-slider">
        @foreach($sliders as $slider)
            <div>
                <div class="home  text-center">
                    <img src="{{$slider->slider_image}}"  style="display: block !important;width: 100%;position: relative" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="slider-contain" style="height:31vh !important">
                                    <div>
                                        {{--<h4>{{$slider->slider_sub_title}}</h4>
                                        <h1>{{$slider->slider_title}}</h1>--}}
                                        {{-- <a href="{{$slider->url}}" class="btn btn-solid">shop now</a>--}}
                                        {{-- <a href="#shop" class="btn btn-solid">shop now</a>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        {{-- <div>
             <div class="home text-center">
                 <img src="/ecommerce/assets/images/home-banner/2.jpg" alt="" class="bg-img blur-up lazyload">
                 <div class="container">
                     <div class="row">
                         <div class="col">
                             <div class="slider-contain">
                                 <div>
                                     <h4>welcome to fashion</h4>
                                     <h1>women fashion</h1>
                                     <a href="#" class="btn btn-solid">shop now</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>--}}
    </div>
</section>
<!-- Home slider end -->