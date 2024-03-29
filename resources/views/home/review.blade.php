<section class="reviews-section section-padding section-bg" id="section_4">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-lg-12 col-12 text-center mb-4 pb-lg-2">
                <em class="text-white">Reviews by Customers</em>

                <h2 class="text-white">Testimonials</h2>
            </div>

            <div class="timeline">

                @php
                    $lastSide = '';
                @endphp

                @foreach ($reviews as $review)
                    @php
                        $currentSide = $review->id % 2 == 0 ? 'right' : 'left';

                        $switchSide = $lastSide != '' && $lastSide != $currentSide;
                        $lastSide = $currentSide;
                    @endphp
                    @if ($currentSide == 'left')
                        <div class="timeline-container timeline-container-left">
                            <div class="timeline-content">
                                <div class="reviews-block">
                                    <div class="reviews-block-image-wrap d-flex align-items-center">
                                        <img src="images/reviews/young-beautiful-woman-pink-warm-sweater-natural-look-smiling-portrait-isolated-long-hair.jpg"
                                            class="reviews-block-image img-fluid" alt="">

                                        <div class="">
                                            <h6 class="text-white mb-0">{{ $review->name }}</h6>
                                            <em class="text-white"> Customers</em>
                                        </div>
                                    </div>

                                    <div class="reviews-block-info">
                                        <p>{{ $review->content }}.</p>

                                        <div class="d-flex border-top pt-3 mt-4">
                                            <strong class="text-white">{{ $review->rating }}<small
                                                    class="ms-2">Rating</small></strong>

                                            <div class="reviews-group ms-auto">
                                                @for ($i = 0; $i < floor($review->rating); $i++)
                                                    <i class="bi-star-fill"></i>
                                                @endfor
                                                @if ($review->rating - floor($review->rating) == 0.5)
                                                    <i class="bi bi-star-half"></i>
                                                @endif
                                                @for ($i = 0; $i < 5 - ceil($review->rating); $i++)
                                                    <i class="bi-star"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="timeline-container timeline-container-right">
                            <div class="timeline-content">
                                <div class="reviews-block">
                                    <div class="reviews-block-image-wrap d-flex align-items-center">
                                        <img src="images/reviews/senior-man-white-sweater-eyeglasses.jpg"
                                            class="reviews-block-image img-fluid" alt="">

                                        <div class="">
                                            <h6 class="text-white mb-0">{{ $review->name }}</h6>
                                            <em class="text-white"> Customers</em>
                                        </div>
                                    </div>

                                    <div class="reviews-block-info">
                                        <p>{{ $review->content }}.</p>

                                        <div class="d-flex border-top pt-3 mt-4">
                                            <strong class="text-white">{{ $review->rating }} <small
                                                    class="ms-2">Rating</small></strong>

                                            <div class="reviews-group ms-auto">
                                                @for ($i = 0; $i < floor($review->rating); $i++)
                                                    <i class="bi-star-fill"></i>
                                                @endfor
                                                @if ($review->rating - floor($review->rating) == 0.5)
                                                    <i class="bi bi-star-half"></i>
                                                @endif
                                                @for ($i = 0; $i < 5 - ceil($review->rating); $i++)
                                                    <i class="bi-star"></i>
                                                @endfor
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                @if ($lastSide == 'left')
                    @auth
                        <div class="timeline-container timeline-container-right">
                            <div class="timeline-content">
                                <div class="reviews-block">
                                    <form method="POST" action="{{ url('/reviews/add') }}" class="my-3 mx-2">
                                        @csrf

                                        <div>
                                            <label for="rating" class="text-white">Rating:</label>
                                            <input type="range" class="form-control-range" min="0" max="5"
                                                step="0.5" value="0" id="rating" name="rating">
                                            <span id="currentRating" class="text-white">0</span>
                                        </div>

                                        <div>
                                            <label for="content" class="text-white">Review:</label>
                                            <textarea name="content" id="content" rows="4" cols="50" class="ps-2 rounded"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-warning text-white">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                @else
                    @auth
                        <div class="timeline-container timeline-container-left">
                            <div class="timeline-content">
                                <div class="reviews-block">
                                    <form method="POST" action="{{ url('/reviews/add') }}" class="my-3 mx-2">
                                        @csrf

                                        <div>
                                            <label for="rating" class="text-white">Rating:</label>
                                            <input type="range" class="form-control-range" min="0" max="5"
                                                step="0.5" value="0" id="rating" name="rating">
                                            <span id="currentRating" class="text-white">0</span>
                                        </div>

                                        <div>
                                            <label for="content" class="text-white">Review:</label>
                                            <textarea name="content" id="content" rows="4" cols="50" class="ps-2 rounded"></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-warning text-white">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endauth
                @endif






            </div>

        </div>
    </div>
</section>
