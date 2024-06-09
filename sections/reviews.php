
<center>
    <section class="container" Style="height:50vh;"><br>
      <div class="testimonial mySwiper">
        <div class="testi-content swiper-wrapper" id="review_bxs">
            
        </div>
        <div class="swiper-button-next nav-btn"></div>
        <div class="swiper-button-prev nav-btn"></div>
        <!-- <div class="swiper-pagination"></div> -->
      </div>
      <br>
    </section>
  </center>
<script src="Script/swiper-bundle.min.js"></script>

     <!-- JavaScript -->
    <script>
      var swiper = new Swiper(".mySwiper", {
  slidesPerView: 1,
  grabCursor: true,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

    </script>

