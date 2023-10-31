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
                        <a class="navbar-brand" href="{{ url('/') }}"><span>Portal</span>Berita</a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav custom_nav">
                            <li class=""><a href="index.html">Home</a></li>

                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-expanded="false">Kategori</a>
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
                <div class="col-md-8">
                    <div class="row">
                        <div class="">
                            <div class="card container" style="background-color: white; width:800px;">
                                <div class="pl-3 mb-3">
                                    <h4>{{ $data->judul_berita }}</h4>
                                </div>
                                <div style="width: 300px; height:100%;">
                                    <img src="{{ asset('/data_blog') . '/' . $data->gambar }}" alt=""
                                        class="img-fluid" style="width: 300px; height:100%;">
                                </div>
                                <div class="pl-3 mt-5 " style="width: 700px; margin-top: 20px">
                                    <p>{{ $data->body_berita }}</p>
                                </div>
                                <div>
                                    <a href="{{ url('/home') }}" class="btn btn-danger"
                                        style="margin-bottom: 20px; ">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="row">
                        <div class="rightbar_content">
                            <div class="single_blog_sidebar wow fadeInUp">
                                <h2>Berita Terkini</h2>
                                <ul class="featured_nav">
                                    @foreach ($beritaTerkini as $berita)
                                        <li> <a class="featured_img" href="{{ $berita->slug }}"><img
                                                    src="{{ asset('/data_blog') . '/' . $berita->gambar }}"
                                                    alt=""></a>
                                            <div class="featured_title"> <a class=""
                                                    href="{{ $berita->slug }}">{{ $berita->judul_berita }}</a> </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="single_blog_sidebar wow fadeInUp">
                                <h2>Popular Posts</h2>
                                <ul class="middlebar_nav wow">
                                    @foreach ($popularPost as $pop)
                                        <li>
                                            <a href="#" class="mbar_thubnail"><img
                                                    src="{{ asset('/data_blog') . '/' . $pop->gambar }}"></a> <a
                                                href="{{ $pop->slug }}"
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
