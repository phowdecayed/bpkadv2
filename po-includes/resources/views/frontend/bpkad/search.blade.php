@extends(getTheme('layouts.app'))

@section('content')
	@if($posts->total() > 0)
    <section id="page-title">

        <div class="container clearfix">
            <h1>Hasil Pencarian</h1>
            <br>
            <h1>{{ $terms }} ({{ $posts->total() }})</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Search</li>
            </ol>
        </div>
    </section>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row gutter-40 col-mb-80">
                    <div class="postcontent col-lg-9">
                        <div id="posts" class="post-timeline">
                            @foreach($posts as $post)
                                <div class="entry">
                                    <div class="entry-timeline">
                                        {{ date('d' , strtotime($post->created_at)) }}
                                        <span>{{ date('F' , strtotime($post->created_at)) }}</span>
                                        <div class="timeline-divider"></div>
                                    </div>
                                    <div class="entry-image">
                                        <a href="{{ prettyUrl($post) }}" data-lightbox="image"><img src="{{ getPicture($post->picture, 'medium', $post->updated_by) }}" alt="{{ $post->title }}"></a>
                                    </div>
                                    <div class="entry-title">
                                        <h2><a href="{{ prettyUrl($post) }}">{{ $post->title }}</a></h2>
                                    </div>
                                    <div class="entry-meta">
                                        <ul>
                                            <li><i class="icon-calendar3"></i>{{ date('d F Y' , strtotime($post->created_at)) }}</li>
                                            <li><a href="{{ prettyUrl($post) }}"><i class="icon-user"></i>{{ $post->name }}</a></li>
                                            <li><i class="icon-folder-open"></i><a href="#">{{ $post->ctitle }}</a></li>
                                            <li><i class="icon-line-eye"></i>{{ $post->hits }} Views</li>
                                        </ul>
                                    </div>
                                    <div class="entry-content">
                                        <p class="mb-0" align='justify'>{{ \Str::limit(strip_tags($post->content), 250) }} <br> <a href="{{ prettyUrl($post) }}">Lanjut Membaca</a></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="pagination justify-content-center">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	@else

	<section id="content">
        <div class="content-wrap">
            <div class="container clearfix">

                <div class="row align-items-center col-mb-80">

                    <div class="col-lg-6">
                        <div class="error404 center">404</div>
                    </div>

                    <div class="col-lg-6">

                        <div class="heading-block text-center text-lg-left border-bottom-0">
                            <h4>Ooopps.! Pencarian dengan kata {{$terms}} tidak dapat ditemukan</h4>
                            <span>Silahkan ulangi pencarian atau tekan tombol beranda untuk kembali</span>
                        </div>

                        <form action="{{ url('search') }}" method="get" class="mb-5">
                            <div class="input-group input-group-lg">
                                <input type="text" name="terms" class="form-control" placeholder="Pencarian...">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="button">Search</button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    </section><!-- #content end -->
	@endif
@endsection
