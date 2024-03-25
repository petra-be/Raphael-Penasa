//SMOOTH LENIS SCROLL
    const lenis = new Lenis({
		duration: 1.5
	});
    lenis.on('scroll', (e) => {})
    function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
    }
    requestAnimationFrame(raf)

//GSAP ANIMATIONS
const element1 = document.querySelector('.loader-content')
const element2 = document.querySelector('.loading')
const element3 = document.querySelector('.loading2')
const element4 = document.querySelector('.container_front-page')

const imgtales = document.querySelector('.img-tales')
const header = document.querySelector('.a-header')
const element5 = document.querySelector('#cci1')
const element6 = document.querySelector('#cci2')
const element7 = document.querySelector('#cci3')
const element8 = document.querySelector('.newsletter_front-page-items')
const element9 = document.querySelector('.title_toy')
const element10 = document.querySelectorAll('.xxx')
const element11 = document.querySelectorAll('.a-works-links_menu li')
const element12 = document.querySelectorAll('.text_other-page')
const des = document.querySelectorAll('.random_work')

var tl1 = gsap.timeline();
 tl1.startTime(1);
  if (element1) {tl1.fromTo(element1, {opacity:0}, {duration:0.7, opacity: 1, ease: Power1.easeInOut} )}  
  if (element2) {tl1.fromTo(element2, {opacity:1}, {duration:1, delay:2, opacity: 0, ease: Power3.easeIn, display: 'none'})} 
  if (element3) {tl1.fromTo(element3, {opacity:0, display: 'none'}, {display: 'block', opacity: 1, ease: Power3.easeIn})}  
  if (element3) {tl1.fromTo(element3, {opacity:1}, {delay: 7, duration:1, opacity: 0, ease: Power3.easeIn, display: 'none'})}  
  if (element4) {tl1.fromTo(element4, {opacity:0, display: 'none'}, {display: 'grid', duration:0.7, opacity: 1, ease: Power1.easeInOut} )}  

  if (imgtales) {tl1.fromTo(imgtales, { display: 'block',scale: 1}, {scaleX: 1, scaleY: 0, display: 'none', duration:.8, ease: Power1.easeInOut})}  
  if (header) {tl1.fromTo(header, {opacity:0, display: 'none', top: "-20px"}, {display: 'block', duration:0.5, opacity: 1, ease: Back.easeOut.config(1.7), top: 0}, 'together1' )}  
  if (element5) {tl1.fromTo(element5, {opacity: 0}, {duration:0.5, opacity: 1, transform: "none", delay: -0.3,ease: Back.easeOut.config(1.7)} )}  
  if (element6) {tl1.fromTo(element6, {opacity: 0}, {duration:0.5, opacity: 1, transform: "none", delay: -0.3,ease: Back.easeOut.config(1.7)} )}  
  if (element7) {tl1.fromTo(element7, {opacity: 0}, {duration:0.5, opacity: 1, transform: "none", delay: -0.3,ease: Back.easeOut.config(1.7)} )} 
  if (element8) {tl1.fromTo(element8, {display: 'none'}, {display: 'inherit', ease: Power1.easeInOut} )}  
  if (element9) {tl1.fromTo(element9,  {opacity: 0}, { duration:1, opacity: 1, transform: "none", ease: Power3.easeInOut}, 'together1' )} 
  if (element10) {tl1.fromTo(element10, {opacity: 0, x: -50}, {  opacity: 1,duration: 0.5,x: 0,stagger: 0.2})} 
  if (element11) {tl1.fromTo(element11, { display: 'none',opacity: 0, x: -50}, { display: 'block',  opacity: 1,duration: 0.5,x: 0,stagger: 0.1})}   
  if (element12) {tl1.fromTo(element12, {opacity: 0}, { opacity: 1, duration: 0.5})} 
  if (des) {tl1.fromTo(des, { opacity: 0}, {  opacity: 1, duration: 0.3})} 

// TEXT REVEAL EFFECT GREEN
  gsap.registerPlugin(ScrollTrigger)
  const splitTypes = document.querySelectorAll('.paragraph_other-page')
  
  splitTypes.forEach((char,i) => {
	const text = new SplitType(char, { types: 'chars, words'})
	ScrollTrigger.matchMedia({
		
	// desktop
	"(min-width: 602px)": function() {
		gsap.from(text.chars, {
			scrollTrigger: {
				trigger: char,
				start: 'top 80%',
				end: 'bottom 80%',
				scrub: true,
				markers: false
			},
			opacity: 0.1,
			stagger: 0.1
		  })}, 
	// mobile
	"(max-width: 601px)": function() {
    	gsap.from(text.chars, {
			scrollTrigger: {
				trigger: char,
				start: 'top 90%',
				end: 'bottom 90%',
				scrub: true,
				markers: false
			},
			opacity: 0.1,
			stagger: 0.1
		  })
  }, 
  	// all 
	"all": function() {
	}});
});

//PARALLAX EFFECT
gsap.utils.toArray('.section-parallax .img-parallax').forEach((section, i) => {
	const heightDiff = section.offsetHeight - section.parentElement.offsetHeight;

	gsap.fromTo(section, {
		y: -heightDiff
	}, {scrollTrigger:{
			trigger: section,
			scrub: true
		},
		y: 0,
		ease: 'none'
	});
});

// SHUFFLE HOVER EFFECT
document.addEventListener("DOMContentLoaded", function() {
  const els = [...document.querySelectorAll(".shuffle, .shuffle-effect")];
  let isScrambling = false;

  const doScrambleEffect = (el) => {
    if (isScrambling) return;
    isScrambling = true;
    let i = 0;
    const initialText = el.textContent;
    const emojiContainer = el.nextElementSibling;

    if (el.classList.contains('shuffle-effect') && emojiContainer) {
      const emoji = emojiContainer.querySelector('.emoji');
      if (emoji) {
        emoji.classList.add('enlarged');
      }
    }
    const shuffleText = () => {
      const shuffled = [...el.textContent]
        .map((a) => ({ sort: Math.random(), value: a }))
        .sort((a, b) => a.sort - b.sort)
        .map((a) => a.value);

      el.textContent = shuffled.join("");
      if (++i < 5) {
        setTimeout(shuffleText, 50);
      } else {
        isScrambling = false;
        el.textContent = initialText;

        if (el.classList.contains('shuffle-effect') && emojiContainer) {
          const emoji = emojiContainer.querySelector('.emoji');
          if (emoji) {
            emoji.classList.remove('enlarged');
          }
        }
      }
    };
    shuffleText();
  };

  els.forEach((el) => {
    el.addEventListener("mouseover", () => {
      if (window.innerWidth > 601) {
        doScrambleEffect(el);
      }
    });
  });
});

// NEWSLETTER
  $( document ).ready(function() {
    $( ".ne-btn-close" ).click(function() {
        $( ".newsletter_front-page-items" ).toggleClass( "ne-animation-close" );
        $( ".newsletter_front-page" ).toggleClass( "ne-animation-disapear" );
    });
});

// 3D IMAGES EFFECT
;(function ($) {
 
	$.fn.transformHeroes = function () {
   
	  var perspective = '2500px',
	  delta = 20,
	  width = this.width(),
	  height = this.height(),
	  midWidth = width / 2,
	  midHeight = height / 2;
   
	  this.on({
		mousemove: function (e) {
		  var pos = $(this).offset(),
		  cursPosX = e.pageX - pos.left,
		  cursPosY = e.pageY - pos.top,
		  cursCenterX = midWidth - cursPosX,
		  cursCenterY = midHeight - cursPosY;
   
		  $(this).css('transform', 'perspective(' + perspective + ') rotateX(' + cursCenterY / delta + 'deg) rotateY(' + -(cursCenterX / delta) + 'deg)');
		  $(this).removeClass('is-out');
		},
		mouseleave: function () {
		  $(this).addClass('is-out');
		} });
	  return this;
	};
   })(jQuery);
   
   $('.card').transformHeroes(); 

// LIENS NON CLIQUABLE
$(document).ready(function() {
  $('.no-translation a').on('click', function(event) {
      event.preventDefault(); 
  });
});

// IMAGE ANIM FOR WORK INDEX
document.addEventListener("DOMContentLoaded", function() {
  if (window.innerWidth > 601) {
    $(document).ready(function () {
      const items = document.querySelectorAll(".index-work li");

      items.forEach((el) => {
        gsap.set(".hover-img-work", { xPercent: -112, yPercent: -0 });
        const image = el.querySelector(".hover-img-work");
        const innerImage = el.querySelector(".hover-img-work img");
        const pos = { x: window.innerWidth / 2, y: window.innerHeight / 2 };
        const mouse = { x: pos.x };
        const speed = 0.1;
        const xSet = gsap.quickSetter(image, "x", "px");
        
        window.addEventListener("mousemove", (e) => {
          mouse.x = e.x;
        });
        
        gsap.ticker.add(() => {
          const dt = 1.0 - Math.pow(1.0 - speed, gsap.ticker.deltaRatio());
          pos.x += (mouse.x - pos.x) * dt;
          xSet(pos.x);
        });
        
        var direction = "",
          oldx = 0,
          lastCursorX = null,
          cursorThreshold = 150,
          mousemovemethod = function (e) {
            if (e.pageX < oldx && e.clientX <= lastCursorX - cursorThreshold) {
              direction = "left";
              lastCursorX = e.clientX;
              innerImage.style.transform = "rotate(-15deg)";
            } else if (
              e.pageX > oldx &&
              e.clientX >= lastCursorX + cursorThreshold
            ) {
              direction = "right";
              lastCursorX = e.clientX;
              innerImage.style.transform = "rotate(15deg)";
            }
            oldx = e.pageX;
          };
        
        $(document).on("mousemoveend", function () {
          innerImage.style.transform = "translateX(0%) rotate(0deg)";
        });
        
        document.addEventListener("mousemove", mousemovemethod);
        
        $(el).on("mouseenter", function () {
          items.forEach((item) => {
            if (item !== el) {
              gsap.to(item, { opacity: 0.1 });
            }
          });
        });
        
        $(el).on("mouseleave", function () {
          items.forEach((item) => {
            gsap.to(item, { opacity: 1 });
          });
        });
        
        (function ($) {
          var timeout;
          $(document).on("mousemove", function (event) {
            if (timeout !== undefined) {
              window.clearTimeout(timeout);
            }
            timeout = window.setTimeout(function () {
              $(event.target).trigger("mousemoveend");
            }, 100);
          });
        })(jQuery);
      });
    });
  }
});

// RANDOM PROJECT FROM WORK PAGE AND TALES PAGE
function getRandomProjectURL(projectClass) {
  var projectURLs = $(projectClass).map(function() {
      return $(this).attr("href");
  }).get();
  return projectURLs[Math.floor(Math.random() * projectURLs.length)];}
jQuery(document).ready(function($) {
  $("#random-project-link").click(function(e) {
      e.preventDefault();
      var randomProjectURL = getRandomProjectURL(".project-link");
      window.location.href = randomProjectURL;
  });
  $("#random-tales-project-link").click(function(e) {
      e.preventDefault();
      var randomProjectURL = getRandomProjectURL(".tales-project-link");
      window.location.href = randomProjectURL;
  });
});

// RANDOM PROJECT FROM BIO PAGE AND MENU
jQuery(document).ready(function($) {
  $("#random-project-link2, #random-project-link3").click(function(e) {
      e.preventDefault();
      var ajaxUrl = $(this).data('ajax-url');
      $.ajax({
          url: ajaxUrl,
          type: 'POST',
          data: {
              action: 'get_random_project_url'
          },
          success: function(response) {
              var randomProjectURL = response.data;
              window.location.href = randomProjectURL;
          },
      });
  });
});

// RANDOM PROJECT FROM SINGLE PROJECT AND TALES TYPE PAGE
jQuery(document).ready(function($) {
  function getRandomProjectURL() {
      return projectUrls[Math.floor(Math.random() * projectUrls.length)];}
  $("#random-project-link-single").click(function(e) {
      e.preventDefault();
      window.location.href = getRandomProjectURL();
  });
  $("#random-tales-project-link-single").click(function(e) {
      e.preventDefault();
      window.location.href = getRandomProjectURL();
  });
});

// open chat 
const link = document.querySelector('a[href="#"]');
const yourElement = document.querySelector('.joinchat');
const closeButton = document.querySelector('.joinchat__close');
const checkbox = document.querySelector('#menuToggle input');

link.addEventListener('click', (event) => {
    event.preventDefault();
    yourElement.classList.add('joinchat--chatbox');
    checkbox.checked = false;
});
closeButton.addEventListener('click', (event) => {
  yourElement.classList.remove('joinchat--chatbox');
});
