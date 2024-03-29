<section class="menu-section section-padding" id="section_3">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 mb-4 mb-lg-0">
                <div class="menu-block-wrap">
                    <div class="text-center mb-4 pb-lg-2">
                        <em class="text-white">Delicious Menu</em>
                        <h4 class="text-white">Breakfast</h4>
                    </div>

                    @foreach ($breakfasts as $food)
                        <div class="menu-block my-4">
                            <div class="d-flex">
                                <h6>
                                    {{ $food->name }}
                                    @if ($food->suggestion)
                                        <span class="badge ms-3">Recommend</span>
                                    @endif
                                </h6>

                                <span class="underline"></span>

                                @if (!$food->discount_price)
                                    <strong class="ms-auto">${{ $food->price }}</strong>
                                @else
                                    <strong class="text-white ms-auto"><del>${{ $food->price }}</del></strong>
                                    <strong class="ms-2">${{ $food->discount_price }}</strong>
                                @endif


                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small>{{ $food->description }}</small>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-lg-6 col-12">
                <div class="menu-block-wrap">
                    <div class="text-center mb-4 pb-lg-2">
                        <em class="text-white">Favourite Menu</em>
                        <h4 class="text-white">Coffee</h4>
                    </div>

                    @foreach ($coffees as $food)
                        <div class="menu-block my-4">
                            <div class="d-flex">
                                <h6>{{ $food->name }}
                                    @if ($food->suggestion)
                                        <span class="badge ms-3">Recommend</span>
                                    @endif
                                </h6>

                                <span class="underline"></span>

                                @if (!$food->discount_price)
                                    <strong class="ms-auto">${{ $food->price }}</strong>
                                @else
                                    <strong class="text-white ms-auto"><del>${{ $food->price }}</del></strong>
                                    <strong class="ms-2">${{ $food->discount_price }}</strong>
                                @endif

                            </div>

                            <div class="border-top mt-2 pt-2">
                                <small>{{$food->description}}</small>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>

        </div>
    </div>
</section>
