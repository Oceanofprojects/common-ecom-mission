<!-- CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@latest/dist/css/glide.core.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@glidejs/glide@latest/dist/css/glide.theme.min.css">
<script src="https://cdn.jsdelivr.net/npm/@glidejs/glide@latest/dist/glide.min.js"></script>

<div class="glide">
  <!-- Slides here -->
  <div class="glide__track" data-glide-el="track">
    <ul class="glide__slides">
      <li class="glide__slide" style="background:url('assets/slide_images/img1.jpg');background-size:cover;background-position: center;height:80vh;width:100%;"><a href="#">View product&nbsp;<span class="fa fa-angle-double-right"></span></a></li>
      <li class="glide__slide" style="background:url('assets/slide_images/img2.jpg');background-size:cover;background-position: center;height:80vh;width:100%;"><a href="#">View product&nbsp;<span class="fa fa-angle-double-right"></span></a></li>
      <li class="glide__slide" style="background:url('assets/slide_images/img3.png');background-size:cover;background-position: center;height:80vh;width:100%;"><a href="#">View product&nbsp;<span class="fa fa-angle-double-right"></span></a></li>
			<li class="glide__slide" style="background:url('assets/slide_images/img4.jpg');background-size:cover;background-position: center;height:80vh;width:100%;"><a href="#">View product&nbsp;<span class="fa fa-angle-double-right"></span></a></li>
    </ul>
  </div>
  <!-- <a href="https://www.jqueryscript.net/tags.php?/Navigation/">Navigation</a> -->
  <div class="glide__arrows" data-glide-el="controls">
    <button style="background:rgba(0,0,0,.2)" class="glide__arrow glide__arrow--left fa fa-chevron-left" data-glide-dir="<"></button>
    <button style="background:rgba(0,0,0,.2)" class="glide__arrow glide__arrow--right fa fa-chevron-right" data-glide-dir=">"></button>
  </div>
  <!-- Pagination -->
  <div class="glide__bullets" data-glide-el="controls[nav]">
    <button class="glide__bullet" data-glide-dir="=0"></button>
    <button class="glide__bullet" data-glide-dir="=1"></button>
    <button class="glide__bullet" data-glide-dir="=2"></button>
		<button class="glide__bullet" data-glide-dir="=3"></button>
  </div>
</div>
<script type="text/javascript">
	new Glide('.glide').mount();
	new Glide('.glide', {

    // Auto change slides after specifed interval.
    autoplay: 4000,

    // <a href="https://www.jqueryscript.net/slider/">Slider</a> type.
    // carousel, slider or slideshow.
    type: 'carousel',

    // Start slider at specifed slide number.
    startAt: 1,

    // Pause autoplay on mouseover the slider.
    hoverpause: true,

    // Change slide on left/right keyboard arrow press.
    keyboard: true,

    // The number of slides to show per screen
    perView: 1,

    // 'center' or 1,2,3...
    focusAt: 0,

    // Space between slides
    gap: 10,

    // Stop running perView number of slides from the end
    bound: false,

    // Minimal touch-swipe distance to need to change slide.
    // False for turning off touch.
    swipeThreshold: 80,

    // Maximum number of slides moved per single swipe or drag
    perTouch: false,

    // Alternate moving distance ratio of swiping and dragging
    touchRatio: .5,

    // Angle required to activate slides moving
    touchAngle: 45,

    // Minimal drag distance to need to change slide.
    // False for turning off drag.
    dragThreshold: 120,

    // <a href="https://www.jqueryscript.net/animation/">Animation</a> duration in ms.
    animationDuration: 400,

    // Animation easing CSS function.
    animationTimingFunc: 'cubic-bezier(0.165, 0.840, 0.440, 1.000)',

    // Call the resize events at most once per every wait in milliseconds.
    throttle: 16,

    // Enable infinite loop on slider type
    rewind: true,

    // Duration of the rewinding animation
    rewindDuration: 800,

    // 'ltr' or 'rtl'
    direction:'rtl',

    // The value of the future viewports which have to be visible in the current view
    // e.g. 100 or { before: 100, after: 50 }
    peek: 0,

    // Options applied at specified media breakpoints
    breakpoints: {},

    // Default CSS classes
    classes: {
      direction: {
        ltr: 'glide--ltr',
        rtl: 'glide--rtl'
      },
      slider: 'glide--slider',
      carousel: 'glide--carousel',
      swipeable: 'glide--swipeable',
      dragging: 'glide--dragging',
      cloneSlide: 'glide__slide--clone',
      activeNav: 'glide__bullet--active',
      activeSlide: 'glide__slide--active',
      disabledArrow: 'glide__arrow--disabled'
    }

})
</script>
