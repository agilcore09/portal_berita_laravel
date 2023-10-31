<!DOCTYPE html>
<html>

<head>
    <title>Portal Berita</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('lib/portal/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/portal/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/portal/assets/css/font.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/portal/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/portal/assets/css/structure.css') }}">
</head>

<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <header id="header">
        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span
                                class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="{{ url('/home') }}"><span>Portal</span>Berita</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav custom_nav">
                            <li class=""><a href="index.html">Home</a></li>

                            <li class="dropdown"> <a href="{{ url('/home') }}" class="dropdown-toggle"
                                    data-toggle="dropdown" role="button" aria-expanded="false">Kategori</a>
                                <ul class="dropdown-menu" role="menu">


                                    @foreach ($category as $cat)
                                        <li><a
                                                href="{{ url('/kategori') . '/' . $cat->nama_kategori }}">{{ $cat->nama_kategori }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>
    </header>

    <section id="contentbody">
        <div class="container">
            <div class="row">
                <div class=" col-sm-12 col-md-6 col-lg-6">
                    <div class="row">
                        <div class="leftbar_content">
                            <h2>Berita Terbaru</h2>

                            @if (request()->cari_berita != null)
                                <div class="single_stuff wow fadeInDown">
                                    <div class="single_stuff_img"> <a
                                            href="{{ url('/') }}/baca/{{ $data->slug }}"><img
                                                src="{{ asset('/data_blog') . '/' . $data->gambar }}"
                                                alt=""></a>
                                    </div>
                                    <div class="single_stuff_article">
                                        <div class="single_sarticle_inner">
                                            <div class="stuff_article_inner">
                                                <h2><a
                                                        href="{{ url('/') }}/baca/{{ $data->slug }}">{{ $data->judul_berita }}</a>
                                                </h2>
                                                <p class="cut-body">{{ $data->body_berita }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (request()->cari_berita == null)
                                @foreach ($data as $item)
                                    <div class="single_stuff wow fadeInDown">
                                        <div class="single_stuff_img"> <a
                                                href="{{ url('/') }}/baca/{{ $item->slug }}"><img
                                                    src="{{ asset('/data_blog') . '/' . $item->gambar }}"
                                                    alt=""></a>
                                        </div>
                                        <div class="single_stuff_article">
                                            <div class="single_sarticle_inner">
                                                <div class="stuff_article_inner">
                                                    <h2><a
                                                            href="{{ url('/') }}/baca/{{ $item->slug }}">{{ $item->judul_berita }}</a>
                                                    </h2>
                                                    <p class="cut-body">{{ $item->body_berita }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="stuffpost_paginatinonarea wow slideInLeft">
                                    <ul class="newstuff_pagnav">

                                        {{ $data->links() }}
                                    </ul>
                                </div>
                            @endif



                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2">
                    <div class="row">
                        <div class="middlebar_content">
                            {{-- <h2 class="yellow_bg">Berita Panas</h2>
                            <div class="middlebar_content_inner wow fadeInUp">
                                <ul class="middlebar_nav">
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img1.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam rhoncus</a>
                                    </li>
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img2.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam
                                            rhoncus</a> </li>
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img1.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam
                                            rhoncus</a> </li>
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img1.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam
                                            rhoncus</a> </li>
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img1.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam
                                            rhoncus</a> </li>
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img1.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam
                                            rhoncus</a> </li>
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img1.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam
                                            rhoncus</a> </li>
                                    <li> <a class="mbar_thubnail" href="#"><img
                                                src="lib/portal/images/hot_img1.jpg" alt=""></a> <a
                                            class="mbar_title" href="#">Sed luctus semper odio aliquam
                                            rhoncus</a> </li>
                                </ul>
                            </div> --}}
                            <div class="popular_categori  wow fadeInUp">
                                <h2 class="limeblue_bg">Kategori Populer</h2>
                                <ul class="poplr_catgnva">
                                    @foreach ($category as $cat)
                                        <li>
                                            <a
                                                href="{{ url('/kategori') . '/' . $cat->nama_kategori }}">{{ $cat->nama_kategori }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="row">
                        <div class="rightbar_content">
                            <div class="single_blog_sidebar wow fadeInUp">
                                <h2>Berita Terkini</h2>
                                <ul class="featured_nav">
                                    @foreach ($beritaTerkini as $berita)
                                        <li> <a class="featured_img"
                                                href="{{ url('/') }}/baca/{{ $berita->slug }}"><img
                                                    src="{{ asset('/data_blog') . '/' . $berita->gambar }}"
                                                    alt=""></a>
                                            <div class="featured_title"> <a class=""
                                                    href="{{ url('/') }}/baca/{{ $berita->slug }}">{{ $berita->judul_berita }}</a>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="single_blog_sidebar wow fadeInUp">
                                <h2>Popular Posts</h2>
                                <ul class="middlebar_nav wow">
                                    @foreach ($popularPost as $pop)
                                        <li>
                                            <a href="{{ url('/') }}/baca/{{ $pop->slug }}"
                                                class="mbar_thubnail"><img
                                                    src="{{ asset('/data_blog') . '/' . $pop->gambar }}"></a> <a
                                                href="{{ url('/') }}/baca/{{ $pop->slug }}"
                                                class="mbar_title">{{ $pop->judul_berita }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer_inner">
                        <p class="pull-left">Copyright &copy; 2023</p>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('/lib/portal/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/portal/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/portal/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('lib/portal/assets/js/custom.js') }}"></script>

</body>

</html>
