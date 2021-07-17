// All JS for Portfoilio 


jQuery(document).ready(function(){
    // Typed JS
	var typed = new Typed('.typed', {
	  strings: ["Freelancer", "Web Designer.", "WordPress Developer."],
	  loop: true,
	  typeSpeed: 100,
	  backSpeed: 100,
	});
	
	// Counter JS
	jQuery('.counter-value').counterUp({
        delay: 10,
        time: 1000
    });
	
	// Slider JS
	jQuery('.testimonial').slick({
	  dots: true,
	  infinite: false,
	  arrows: false,
	  speed: 300,
	  slidesToShow: 2,
	  slidesToScroll: 1,
	  responsive: [
		{
		  breakpoint: 1024,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1,
			infinite: true,
			dots: true
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
		// You can unslick at a given breakpoint now by adding:
		// settings: "unslick"
		// instead of a settings object
	  ]
	});
	
});

