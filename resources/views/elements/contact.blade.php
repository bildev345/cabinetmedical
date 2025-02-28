@extends('layouts.master')

@section('mainx')

     <!-- MAKE AN APPOINTMENT -->
     <section id="appointment" data-stellar-background-ratio="3">
        <div class="container">
             <div class="row">

                  <div class="col-md-6 col-sm-6">
                       <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                  </div>

                  <div class="col-md-6 col-sm-6">
                       <!-- CONTACT FORM HERE -->
                       <form id="appointment-form" role="form" method="post" action="#">

                            <!-- SECTION TITLE -->
                            <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                 <h2>Make an appointment</h2>
                            </div>

                            <div class="wow fadeInUp" data-wow-delay="0.8s">
                                 <div class="col-md-6 col-sm-6">
                                      <label for="name">Name</label>
                                      <input type="text" class="form-control" id="name" name="name" placeholder="Full Name">
                                 </div>

                                 <div class="col-md-6 col-sm-6">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                                 </div>

                                 <div class="col-md-6 col-sm-6">
                                      <label for="date">Select Date</label>
                                      <input type="date" name="date" value="" class="form-control">
                                 </div>

                                 <div class="col-md-6 col-sm-6">
                                      <label for="select">Select Department</label>
                                      <select class="form-control">
                                           <option>General Health</option>
                                           <option>Cardiology</option>
                                           <option>Dental</option>
                                           <option>Medical Research</option>
                                      </select>
                                 </div>

                                 <div class="col-md-12 col-sm-12">
                                      <label for="telephone">Phone Number</label>
                                      <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                                      <label for="Message">Additional Message</label>
                                      <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea>
                                      <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Button</button>
                                 </div>
                            </div>
                      </form>
                  </div>

             </div>
        </div>
   </section>


   <!-- GOOGLE MAP -->
   <section id="google-map">
   <!-- How to change your own map point
          1. Go to Google Maps
          2. Click on your location point
          3. Click "Share" and choose "Embed map" tab
          4. Copy only URL and paste it within the src="" field below
  -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.520986052066!2d-4.960026724862404!3d34.00483562023298!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd9f8c60c1efe303%3A0x33ffaa02926ac298!2sIFMOTICA%20F%C3%A8s%20OFPPT!5e0!3m2!1sfr!2sma!4v1740596645317!5m2!1sfr!2sma" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="98%" height="350" frameborder="0" style="border:0;margin:10px" allowfullscreen></iframe>
   </section>


@endsection
