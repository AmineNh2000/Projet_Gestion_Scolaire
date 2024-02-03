@extends('layouts.layoutProf')


@section('title', 'Accueil')

@section('content')

<section class="contact">

   <div class="row">

      <div class="image">
         <div class="box-container">

            <div class="box">
               <i class="fas fa-phone"></i>
               <h3>phone number</h3>
               <a href="tel:1234567890">123-456-7890</a>
               <a href="tel:1112223333">111-222-3333</a>
            </div>
            
            <div class="box">
               <i class="fas fa-envelope"></i>
               <h3>email address</h3>
               <a href="mailto:shaikhanas@gmail.com">ENSRABAT@gmail.come</a>
               <a href="mailto:anasbhai@gmail.com">EnsAdministration@gmail.com</a>
            </div>
      
            <div class="box">
               <i class="fas fa-map-marker-alt"></i>
               <h3>Address</h3>
               <a href="#">A108 Adam Street,
                  Rabat, NY 535022</a>
            </div>

            <div class="box">
               <i class="bi bi-clock"></i>
               <h3>Open Hours</h3>
               <a href="#">lundi - samedi</a>
               <p class="fs-5 bolder">8:00AM - 06:00PM</p>
               <p>

               </p>
               </a>
            </div>
      
         </div>
         <img src="images/contact-img.svg" alt="">
      </div>

      <form action="" method="post">
         <h3>Contactez-nous</h3>
         <input type="text" placeholder="Entrez votre nom" name="name" required maxlength="50" class="box">
         <input type="email" placeholder="Entrez votre e-mail" name="email" required maxlength="50" class="box">
         <input type="number" placeholder="Entrez votre numéro" name="number" required maxlength="50" class="box">
         <textarea name="msg" class="box" placeholder="Entrez votre message" required maxlength="1000" cols="30" rows="10"></textarea>
         <input type="submit" value="Envoyer le message" class="inline-btn" name="submit">
         
      </form>

   </div>



</section>

@endsection