@extends('layouts.master')

@section('main')

<!-- ACTUALITÉS -->
    <section id="news" data-stellar-background-ratio="2.5">
        <div class="container">
             <div class="row">

                  <div class="col-md-12 col-sm-12">
                       <!-- TITRE DE LA SECTION -->
                       <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                            <h2>Dernières Actualités</h2>
                       </div>
                  </div>

                  <div class="col-md-4 col-sm-6">
                       <!-- VIGNETTE D'ACTUALITÉ -->
                       <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                            <a href="news-detail.html">
                                 <img src="images/news-image1.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info">
                                 <span>08 Mars 2018</span>
                                 <h3><a href="news-detail.html">À propos de la Technologie Incroyable</a></h3>
                                 <p>Maecenas risus neque, placerat volutpat tempor ut, vehicula et felis.</p>
                                 <div class="author">
                                      <img src="images/author-image.jpg" class="img-responsive" alt="">
                                      <div class="author-info">
                                           <h5>Jeremie Carlson</h5>
                                           <p>PDG / Fondateur</p>
                                      </div>
                                 </div>
                            </div>
                       </div>
                  </div>

                  <div class="col-md-4 col-sm-6">
                       <!-- VIGNETTE D'ACTUALITÉ -->
                       <div class="news-thumb wow fadeInUp" data-wow-delay="0.6s">
                            <a href="news-detail.html">
                                 <img src="images/news-image2.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info">
                                 <span>20 Février 2018</span>
                                 <h3><a href="news-detail.html">Introduction d'un nouveau processus de guérison</a></h3>
                                 <p>Fusce vel sem finibus, rhoncus massa non, aliquam velit. Nam et est ligula.</p>
                                 <div class="author">
                                      <img src="images/author-image.jpg" class="img-responsive" alt="">
                                      <div class="author-info">
                                           <h5>Jason Stewart</h5>
                                           <p>Directeur Général</p>
                                      </div>
                                 </div>
                            </div>
                       </div>
                  </div>

                  <div class="col-md-4 col-sm-6">
                       <!-- VIGNETTE D'ACTUALITÉ -->
                       <div class="news-thumb wow fadeInUp" data-wow-delay="0.8s">
                            <a href="news-detail.html">
                                 <img src="images/news-image3.jpg" class="img-responsive" alt="">
                            </a>
                            <div class="news-info">
                                 <span>27 Janvier 2018</span>
                                 <h3><a href="news-detail.html">Revue de la Recherche Médicale Annuelle</a></h3>
                                 <p>Vivamus non nulla semper diam cursus maximus. Pellentesque dignissim.</p>
                                 <div class="author">
                                      <img src="images/author-image.jpg" class="img-responsive" alt="">
                                      <div class="author-info">
                                           <h5>Andrio Abero</h5>
                                           <p>Publicité en Ligne</p>
                                      </div>
                                 </div>
                            </div>
                       </div>
                  </div>

             </div>
        </div>
    </section>
<!-- FIN DE LA SECTION ACTUALITÉS -->
@endsection
