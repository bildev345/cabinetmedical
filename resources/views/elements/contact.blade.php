@extends('layouts.master')

@section('main')

<<<<<<< HEAD
     <!-- PRENDRE UN RENDEZ-VOUS -->
=======
     <!-- MAKE AN APPOINTMENT -->
>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
     <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
             <div class="row">

                  <div class="col-md-6 col-sm-6">
                       <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                  </div>

                  <div class="col-md-6 col-sm-6">
<<<<<<< HEAD
                       <!-- FORMULAIRE DE CONTACT ICI -->
                       <form id="appointment-form" role="form" method="post" action="#">

                            <!-- TITRE DE LA SECTION -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                 <h2>Prendre un rendez-vous</h2>
=======
                       <!-- CONTACT FORM HERE -->
                       <form id="appointment-form" role="form" method="post" action="#">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                 <h2>Make an appointment</h2>
>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                 <div class="col-md-6 col-sm-6">
<<<<<<< HEAD
                                      <label for="name">Nom</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Nom complet">
=======
                                      <label for="name">Name</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
                                 </div>

                                 <div class="col-md-6 col-sm-6">
                                      <label for="email">Email</label>
<<<<<<< HEAD
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Votre Email">
                                 </div>

                                 <div class="col-md-6 col-sm-6">
                                      <label for="date">Sélectionner une date</label>
=======
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                 </div>

                                 <div class="col-md-6 col-sm-6">
                                      <label for="date">Select Date</label>
>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
                                      <input type="date" name="date" value="" class="form-control">
                                 </div>

                                 <div class="col-md-6 col-sm-6">
<<<<<<< HEAD
                                      <label for="select">Sélectionner un département</label>
                                      <select class="form-control">
                                           <option>Santé générale</option>
                                           <option>Cardiologie</option>
                                           <option>Dentaire</option>
                                           <option>Recherche médicale</option>
=======
                                      <label for="select">Select Department</label>
                                      <select class="form-control">
                                           <option>General Health</option>
                                           <option>Cardiology</option>
                                           <option>Dental</option>
                                           <option>Medical Research</option>
>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
                                      </select>
                                 </div>

                                 <div class="col-md-12 col-sm-12">
<<<<<<< HEAD
                                      <label for="telephone">Numéro de téléphone</label>
                                      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Téléphone">
                                      <label for="Message">Message supplémentaire</label>
                                      <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                      <button type="submit" class="form-control" id="cf-submit" name="submit">Envoyer</button>
=======
                                      <label for="telephone">Phone Number</label>
                                      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                      <label for="Message">Additional Message</label>
                                      <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                      <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
                                 </div>
                            </div>
                      </form>
                  </div>

             </div>
        </div>
   </section>


   <!-- GOOGLE MAP -->
   <section id="google-map">
<<<<<<< HEAD
   <!-- Comment changer votre propre point de carte
          1. Allez sur Google Maps
          2. Cliquez sur votre point de localisation
          3. Cliquez sur "Partager" et choisissez l'onglet "Intégrer une carte"
          4. Copiez uniquement l'URL et collez-le dans le champ src="" ci-dessous
=======
   <!-- How to change your own map point
          1. Go to Google Maps
          2. Click on your location point
          3. Click "Share" and choose "Embed map" tab
          4. Copy only URL and paste it within the src="" field below
>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
  -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.520986052066!2d-4.960026724862404!3d34.00483562023298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8c60c1efe303%3A0x33ffaa02926ac298!2sIFMOTICA%20F%C3%A8s%20OFPPT!5e0!3m2!1sfr!2sma!4v1740596645317!5m2!1sfr!2sma" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="98%" height="350" frameborder="0" style="border:0;margin:10px" allowfullscreen></iframe>
   </section>

<<<<<<< HEAD
=======

>>>>>>> be3242ba763d4add58701928d2e9ecf742e3c92d
@endsection
