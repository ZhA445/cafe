<section class="barista-section section-padding section-bg" id="barista-team">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                <em class="text-white">Creative Baristas</em>

                <h2 class="text-white">Meet People</h2>
            </div>


            @foreach ($chefs as $chef)
                <div class="col-lg-3 col-md-6 col-12 mb-4">
                    <div class="team-block-wrap">
                        <div class="team-block-info d-flex flex-column">
                            <div class="d-flex mt-auto mb-3">
                                <h4 class="text-white mb-0">{{$chef->name}}</h4>

                                <p class="badge ms-4"><em>{{$chef->position}}</em></p>
                            </div>

                            <p class="text-white mb-0">{{$chef->description}}</p>
                        </div>

                        <div class="team-block-image-wrap">
                            <img src="chefsimage/{{$chef->img}}"
                                class="team-block-image img-fluid" alt="{{$chef->img}}">
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-block-wrap">
                    <div class="team-block-info d-flex flex-column">
                        <div class="d-flex mt-auto mb-3">
                            <h4 class="text-white mb-0">Sandra</h4>

                            <p class="badge ms-4"><em>Manager</em></p>
                        </div>

                        <p class="text-white mb-0">your favourite coffee daily lives.</p>
                    </div>

                    <div class="team-block-image-wrap">
                        <img src="images/team/cute-korean-barista-girl-pouring-coffee-prepare-filter-batch-brew-pour-working-cafe.jpg"
                            class="team-block-image img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-block-wrap">
                    <div class="team-block-info d-flex flex-column">
                        <div class="d-flex mt-auto mb-3">
                            <h4 class="text-white mb-0">Jackson</h4>

                            <p class="badge ms-4"><em>Senior</em></p>
                        </div>

                        <p class="text-white mb-0">your favourite coffee daily lives.</p>
                    </div>

                    <div class="team-block-image-wrap">
                        <img src="images/team/small-business-owner-drinking-coffee.jpg"
                            class="team-block-image img-fluid" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="team-block-wrap">
                    <div class="team-block-info d-flex flex-column">
                        <div class="d-flex mt-auto mb-3">
                            <h4 class="text-white mb-0">Michelle</h4>

                            <p class="badge ms-4"><em>Barista</em></p>
                        </div>

                        <p class="text-white mb-0">your favourite coffee daily consectetur.</p>
                    </div>

                    <div class="team-block-image-wrap">
                        <img src="images/team/smiley-business-woman-working-cashier.jpg"
                            class="team-block-image img-fluid" alt="">
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</section>
