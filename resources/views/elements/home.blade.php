@extends('layouts.master')

@section('main')
    <!-- ACCUEIL -->
    <section id="home" class="slider" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">

                    <div class="owl-carousel owl-theme">
                            <div class="item item-first">
                                <div class="caption">
                                    <div class="col-md-offset-1 col-md-10">
                                        <h3>Rendons votre vie plus heureuse</h3>
                                        <h1>Vie Saine</h1>
                                        <a href="#team" class="section-btn btn btn-default smoothScroll">Rencontrez Nos Médecins</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item item-second">
                                <div class="caption">
                                    <div class="col-md-offset-1 col-md-10">
                                        <h3>Aenean luctus lobortis tellus</h3>
                                        <h1>Nouveau Mode de Vie</h1>
                                        <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">En Savoir Plus</a>
                                    </div>
                                </div>
                            </div>

                            <div class="item item-third">
                                <div class="caption">
                                    <div class="col-md-offset-1 col-md-10">
                                        <h3>Pellentesque nec libero nisi</h3>
                                        <h1>Vos Avantages de Santé</h1>
                                        <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Lire les Histoires</a>
                                    </div>
                                </div>
                            </div>
                    </div>

            </div>
        </div>
    </section>


    <!-- À PROPOS -->
    <section id="about">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                            <h2 class="wow fadeInUp" data-wow-delay="0.6s">Bienvenue à Votre <i class="fa fa-h-square"></i>abinet Médical</h2>
                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                <p>Aenean luctus lobortis tellus, vel ornare enim molestie condimentum. Curabitur lacinia nisi vitae velit volutpat venenatis.</p>
                                <p>Sed a dignissim lacus. Quisque fermentum est non orci commodo, a luctus urna mattis. Ut placerat, diam a tempus vehicula.</p>
                            </div>
                            <figure class="profile wow fadeInUp" data-wow-delay="1s">
                                <img src="images/author-image.jpg" class="img-responsive" alt="">
                                <figcaption>
                                    <h3>Dr. Neil Jackson</h3>
                                    <p>Directeur Général</p>
                                </figcaption>
                            </figure>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ÉQUIPE -->
    <section id="team" data-stellar-background-ratio="1">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-6">
                    <div class="about-info">
                            <h2 class="wow fadeInUp" data-wow-delay="0.1s">Médecin</h2>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="col-md-4 col-sm-6">
                    <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">
                        <img src="images/team-image2.jpg" class="img-responsive" alt="">

                            <div class="team-info">
                                <h3>Jason Stewart</h3>
                                <p>Grossesse</p>
                                <div class="team-contact-info">
                                        <p><i class="fa fa-phone"></i> 010-070-0170</p>
                                        <p><i class="fa fa-envelope-o"></i> <a href="#">pregnancy@company.com</a></p>
                                </div>
                                <ul class="social-icon">
                                        <li><a href="#" class="fa fa-facebook-square"></a></li>
                                        <li><a href="#" class="fa fa-envelope-o"></a></li>
                                        <li><a href="#" class="fa fa-flickr"></a></li>
                                </ul>
                            </div>

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="uni-doctor-details-right">
                        <div class="team-thumb wow fadeInUp" data-wow-delay="0.4s">

                        <!-- RÉSUMÉ -->
                        <div class="uni-doctor-details-summary">
                            <div class="uni-doctor-details-title">
                                <h3 class="wow fadeInUp" data-wow-delay="0.5s">Résumé</h3>
                                <div class="uni-divider"></div>
                            </div>
                            <p class="wow fadeInUp" data-wow-delay="1s">
                                Pellentesque habitant morbi tristique senectus et netus et malesuada
                                fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies
                                eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper.
                                Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit
                                amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum
                                sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget
                                tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim
                                ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis. Praesent
                                dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate
                                magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis,
                                accumsan porttitor, facilisis luctus, metus.
                            </p>
                        </div>

                        <!-- ÉDUCATION/DIPLÔMES -->
                        <div class="uni-doctor-details-degrees" class="wow fadeInUp" data-wow-delay="1.2s">
                            <div class="uni-doctor-details-title">
                                <h3 class="wow fadeInUp" data-wow-delay="1.5s">Éducation/Diplômes</h3>
                                <div class="uni-divider"></div>
                            </div>
                            <ul class="list-unstyled" data-wow-delay="2s">
                                <li data-wow-delay="2.2s" class="wow fadeInUp">
                                    <span>1965 - 1970</span>: École Élémentaire
                                </li>
                                <li data-wow-delay="2.4s" class="wow fadeInUp">
                                    <span>1970 - 1974</span>: École Secondaire
                                </li>
                                <li data-wow-delay="2.6s" class="wow fadeInUp">
                                    <span>1974 - 1977</span>: Lycée
                                </li>
                                <li data-wow-delay="2.8s" class="wow fadeInUp">
                                    <span>1977 - 1982</span>: Université de Harvard
                                </li>
                                <li data-wow-delay="3s" class="wow fadeInUp">
                                    <span>1982 - 1985</span>: Master à l'Université de Harvard
                                </li>
                            </ul>
                        </div>

                        <!-- CONTACT -->
                        <div class="uni-doctor-details-contact">
                            <div class="uni-doctor-details-title">
                                <h3 class="wow fadeInUp" data-wow-delay="3s">Contact</h3>
                                <div class="uni-divider"></div>
                            </div>
                            <ul class="list-unstyled">
                                <li data-wow-delay="3.1s" class="wow fadeInUp"><i class="fa fa-map-marker" aria-hidden="true"></i> 45 Queen's Park Rd, Brighton, UK</li>
                                <li data-wow-delay="3.2s" class="wow fadeInUp"><i class="fa fa-phone" aria-hidden="true"></i> (094) 123 4567 - (094) 123 4568</li>
                                <li data-wow-delay="3.4s" class="wow fadeInUp"><i class="fa fa-envelope-o" aria-hidden="true"></i> medicareplus@domain.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>

    <style>
        .uni-doctor-details-title h3 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .uni-divider {
            width: 50px;
            height: 3px;
            background-color: #3498db;
            margin-bottom: 20px;
        }

        .uni-doctor-details-summary p,
        .uni-doctor-details-degrees ul,
        .uni-doctor-details-contact ul {
            font-size: 16px;
            line-height: 1.6;
        }

        .uni-doctor-details-degrees ul li,
        .uni-doctor-details-contact ul li {
            margin-bottom: 10px;
        }

        .uni-doctor-details-contact ul li i {
            margin-right: 10px;
        }
    </style>

@endsection
