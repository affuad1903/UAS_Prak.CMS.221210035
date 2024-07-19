<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Web Profile Affandi Putra Pradana</title>
        <link rel="icon" type="image/x-icon" href="{{asset('template')}}/assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('template')}}/css/styles.css" rel="stylesheet" />
        <script src="{{asset('admin')}}/js/pil.js"></script>
        {{-- Devicon --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                
                <span class="d-block d-lg-none">
                    @foreach ($aboutdata as $item)
                    {{$item->judul}}
                    @endforeach
                </span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#profile">PROFILE</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">EXPERIENCE</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">SKILLS</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contactus">CONTACT US</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('auth')}}">LOGIN</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">

            <!-- About-->
            <section class="resume-section" id="profile">
                <div class="resume-section-content">
                    <h1 class="mb-0">
                        @foreach ($aboutdata as $item)
                        {!! set_about_nama($item->judul) !!}
                        @endforeach
                    </h1>
                    <div class="subheading mb-5">
                        {{ get_meta_value('_kota') }} · {{ get_meta_value('_provinsi') }} · {{ get_meta_value('_nohp') }} ·
                        <a href="mailto:name@email.com">{{ get_meta_value('_email') }}</a>
                    </div>
                    <p class="lead mb-5">
                        @foreach ($aboutdata as $item)
                        {{$item->isi}}
                        @endforeach
                    </p>
                    <div class="social-icons">
                        <a class="social-icon" href="{{ get_meta_value('_instagram') }}" target="blank"><i class="fab fa-instagram"></i></a>
                        <a class="social-icon" href="{{ get_meta_value('_github') }}" target="blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </section>
            <hr class="m-0" />

            <!-- Experience-->
            <section class="resume-section" id="experience">
                <div class="resume-section-content">
                    <h2 class="mb-5">Experience</h2>
                    <div class="resume-section-content">
                        @foreach ($experience as $item)
                            <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                                <div class="flex-grow-1">
                                    <h3 class="mb-0">{{ $item->judul }}</h3>
                                    <div class="subheading mb-3">{{ $item->info1 }}</div>
                                    {!! $item->isi !!}
                                </div>
                                <div class="flex-shrink-0"><span class="text-primary">{{ $item->tgl_mulai_indo }} -
                                        {{ $item->tgl_akhir_indo }}</span></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <hr class="m-0" />

            <!-- Skills-->
            <section class="resume-section" id="skills">
                <div class="resume-section-content">
                    <h2 class="mb-5">Skills</h2>
                    <div class="subheading mb-3">Programming Languages & Tools</div>
                    <ul class="list-inline dev-icons">
                        @foreach (explode(', ', get_meta_value('_language')) as $item)
                            <li class="list-inline-item"><i class="devicon-{{ strtolower($item) }}-plain"></i></li>
                        @endforeach
                    </ul>
                    <div class="subheading mb-3">Workflow</div>
                    {!! set_list_workflow(get_meta_value('_workflow')) !!}
                </div>
            </section>
            <hr class="m-0" />

            <!-- Contact US-->
            <section class="resume-section" id="contactus">
                <div class="resume-section-content">
                    <h2 class="mb-5">Contact Us</h2>
                    @include('home.pesan')
                    <form style="width: 26rem;" class="lead mb-5" action="{{route('home.store')}}" method="POST">
                      @csrf
                      <!-- Name input -->
                      <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="namaguest">Name</label>
                        <input type="text" name="namaguest" id="namaguest" class="form-control" value="{{ Session::get('namaguest') }}" />
                      </div>
                    
                      <!-- Email input -->
                      <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="emailguest">Email address</label>
                        <input type="email" name="emailguest" id="emailguest" class="form-control" value="{{ Session::get('emailguest') }}"/>
                      </div>
                    
                      <!-- Message input -->
                      <div data-mdb-input-init class="form-outline mb-4">
                        <label class="form-label" for="pesanguest">Message</label>
                        <textarea class="form-control" name="pesanguest" id="pesanguest" rows="4" value="{{ Session::get('pesanguest') }}"></textarea>
                      </div>
                                        
                      <!-- Submit button -->
                      <button data-mdb-ripple-init type="submit"  class="btn btn-primary btn-block mb-4">Send</button>
                    </form>
                </div>
            </section>
            <hr class="m-0" />
            <footer class="bg-body-tertiary text-center">

                <!-- Grid container -->
                <div class="container p-4 pb-0">
                  <!-- Section: Social media -->
                  <section class="mb-4">
                    <!-- Instagram -->
                    <a
                      data-mdb-ripple-init
                      class="btn text-white btn-floating m-1"
                      style="background-color: #ac2bac;"
                      href="{{ get_meta_value('_instagram') }}"
                      role="button"
                      target="blank"
                      ><i class="fab fa-instagram"></i
                    ></a>
                    <!-- Github -->
                    <a
                      data-mdb-ripple-init
                      class="btn text-white btn-floating m-1"
                      style="background-color: #333333;"
                      href="{{ get_meta_value('_github') }}"
                      role="button"
                      target="blank"
                      ><i class="fab fa-github"></i
                    ></a>
                  </section>
                  <!-- Section: Social media -->
                </div>
                <!-- Grid container -->
              
                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
                  © 2024 Copyright: Affandi Putra Pradana || 221210035
                </div>
                <!-- Copyright -->
              </footer>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('template')}}/js/scripts.js"></script>
    </body>
</html>
