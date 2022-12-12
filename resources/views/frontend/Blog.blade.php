@extends('layouts.index')
@section('title')
{{ 'Blog'}}
@endsection
@section('contentHome')

<main class="main">
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="font-xxl text-brand">Our Blog My Team</h1>
                </div>
                <div class="popup">
                    <div class="contentBox">
                    </div>
                </div>
                <div class="loop-grid">
                    <div class="row">
                        <div class="col-12">
                            <article class="first-post mb-30 wow fadeIn animated hover-up">
                                <div class="img-hover-slide position-relative overflow-hidden">
                                    <span class="top-right-icon bg-dark"><i class="fi-rs-bookmark"></i></span>
                                    <div class="post-thumb img-hover-scale">
                                        <a href="blog-details.html">
                                            <img src=" {{ asset('frontend_assets/imgs/theme/avatar.jpeg') }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <h2 class="post-title mb-20">
                                        <a href="#">Phạm Quốc Vinh</a>
                                    </h2>
                                    <p class="post-exerpt font-medium text-muted mb-30">18/04/1998</p>
                                    <div class="mb-20 entry-meta meta-2">
                                        <p class="text">sinh ra và lớn lên tại thành phố Hồ Chí Minh sở thích là đi du lịch
                                            <span class="moreText"> Đã tốt nghiệp tại Trường Học Viện Cán Bộ thành phố Hồ Chí Minh. Đang làm việc tại công ty WhyDah.
                                            </span>
                                        </p>
                                        <button class="read-more-btn">Read more</button>
                                    </div>
                                </div>
                            </article>
                            <article class="first-post mb-30 wow fadeIn animated hover-up">
                                <div class="img-hover-slide position-relative overflow-hidden">
                                    <span class="top-right-icon bg-dark"><i class="fi-rs-bookmark"></i></span>
                                    <div class="post-thumb img-hover-scale">
                                        <a href="blog-details.html">
                                            <img src="assets/imgs/blog/hinhanh.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <h2 class="post-title mb-20">
                                        <a href="#">Nguyễn Hồng Quân</a>
                                    </h2>
                                    <p class="post-exerpt font-medium text-muted mb-30">04/01/1995</p>
                                    <div class="mb-20 entry-meta meta-2">
                                        <p class="text">
                                            <span class="moreText">
                                            </span>
                                        </p>
                                        <button class="read-more-btn">Read more</button>
                                    </div>
                                </div>
                            </article>
                            </article>
                            <article class="first-post mb-30 wow fadeIn animated hover-up">
                                <div class="img-hover-slide position-relative overflow-hidden">
                                    <span class="top-right-icon bg-dark"><i class="fi-rs-bookmark"></i></span>
                                    <div class="post-thumb img-hover-scale">
                                        <a href="blog-details.html">
                                            <img src="assets/imgs/blog/hinhanh.jpg" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <h2 class="post-title mb-20">
                                        <a href="#">Nguyễn Hoàng Thiện</a>
                                    </h2>
                                    <p class="post-exerpt font-medium text-muted mb-30">06/06/1988</p>
                                    <div class="mb-20 entry-meta meta-2">
                                        <p class="text">
                                            <span class="moreText">
                                            </span>
                                        </p>
                                        <button class="read-more-btn">Read more</button>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <div class="col-lg-6">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</main>


@endsection