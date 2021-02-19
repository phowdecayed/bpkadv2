@extends(getTheme('layouts.app'))

@section('content')

<section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-60 min-vh-md-100 include-header">
    <div class="slider-inner">
        <div class="swiper-container swiper-parent">
            <div class="swiper-wrapper">
                    @foreach(headlinePost(3, 0) as $headlinePost)
                    <div class="swiper-slide dark">
                        <div class ="container">
                            <div class="slider-caption slider-caption-center">
                                <h2 data-animate="fadeInUp"><a href="{{ prettyUrl($headlinePost) }}">{{ $headlinePost->title }}</a></h2>
                            </div>
                        </div>
                        <div class="swiper-slide-bg" style="background-image: url('{{ getPicture($headlinePost->picture, 'original', $headlinePost->updated_by) }}');">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
            <div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
            <div class="slide-number">
                <div class="slide-number-current"></div><span>/</span>
                <div class="slide-number-total"></div>
            </div>
            <a href="#" data-scrollto="#content" data-offset="100" class="one-page-arrow dark"><i class="icon-angle-down infinite animated fadeInDown"></i></a>
        </div>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg">
                        <h2>Berita Terbaru</h2>
                    </div>
                    <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                        <a href="{{ url('/category/all') }}" class="button button-reveal button-large button-circle text-right m-0"><i class="icon-angle-right"></i><span>Lihat Semua Berita</span></a>
                    </div>
                </div>
            <hr>
        </div>
        <div class="row gutter-40 col-mb-80">
            <div class="postcontent col-lg-9">
                <div id="posts" class="row grid-container gutter-40">
                    <div class="entry col-12">
                        @foreach(latestPostWithPaging(5) as $latestPost)
                            <div class="grid-inner row no-gutters">
                                <div class="entry-image col-md-4">
                                    <a href="{{ prettyUrl($latestPost) }}" data-lightbox="image"><img src="{{ getPicture($latestPost->picture, 'medium', $latestPost->updated_by) }}" alt="{{ $latestPost->title }}"></a>
                                </div>

                                <div class="col-md-8 pl-md-4">
                                    <div class="entry-title title-sm">
                                        <h2><a href="{{ prettyUrl($latestPost) }}">{{ $latestPost->title }}</a></h2>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="icon-calendar3"></i>{{ date('d F Y' , strtotime($latestPost->created_at)) }}</li>
                                            <li><a href="{{ prettyUrl($latestPost) }}"><i class="icon-user"></i>{{ $latestPost->name }}</a></li>
                                            <li><i class="icon-folder-open"></i><a href="#">{{ $latestPost->ctitle }}</a></li>
                                            <li><i class="icon-line-eye"></i>{{ $latestPost->hits }} Views</li>
                                        </ul>
                                        <div class="entry-content">
                                            <p align="justify">{{ \Str::limit(strip_tags($latestPost->content), 200) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="pagination justify-content-center">
                            {{ latestPostWithPaging(5)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <hr>

    </div>
</section>

@endsection
