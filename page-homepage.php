<?php /*
Template Name: Homepage Template
*/
get_header(); ?>


 <!-- ↓↓↓↓ LOADING RANDOM CITATION ↓↓↓↓ -->
 <div class="loading">
        <div class="loader-content">
            <h3 id="load-subtitle">Loading...</h3>
            <?php if( have_rows('various_quotes') ): 
                        while( have_rows('various_quotes') ): the_row();
                        $quote = get_sub_field('quote'); 
                        $author_quote = get_sub_field('author_quote'); ?>
                <div class="randomly">
                
                        <h2 class="load-random-text">—<br><?php echo $quote; ?><br>—</h2>
                        <h3 id="load-subtitle"><?php echo $author_quote; ?></h3>
                    
                </div>
                <?php endwhile; endif; ?>
        </div> 
    </div>
    <!-- ↑↑↑↑ END LOADING RANDOM CITATION ↑↑↑↑ -->




    <!-- ↓↓↓↓ LOADING RAPHAEL ↓↓↓↓ -->
    <div class="loading2">
        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/raph-older.jpg" alt="">
        <div class="raphael-title">Raphaël<br>Penasa</div>
        <ul class="loading2_items">
            <li class="loading2_item" id="l_i1">Screenwriter</li>
            <li class="loading2_item" id="l_i2">Development Executive Producer</li>
            <li class="loading2_item" id="l_i3">Narrative Designer</li>
          </ul>
    </div>
    <!-- ↑↑↑↑ END LOADING RAPHAEL ↑↑↑↑ -->



    <!-- ↓↓↓↓ CHOICE SML ↓↓↓↓ -->
    <div class="container_front-page">

        <ul class="global-choice_items">  
            <li class="global-choice_item">       
                <label class="container_choice-item" id="cci1">
                <?php if( have_rows('choice_s_repeater') ): 
                        while( have_rows('choice_s_repeater') ): the_row();
                        $text_s = get_sub_field('text_s'); ?>
                    <p><?php echo $text_s; ?></p>
                    <?php endwhile; endif; ?>
                    <a href="<?php echo esc_url(home_url('/bio/')); ?>"><div class="checkmark lottie" id="size_s"></div></a>
                </label>
            </li>
            <li class="global-choice_item">
                <label class="container_choice-item" id="cci2">
                <?php if( have_rows('choice_m_repeater') ): 
                        while( have_rows('choice_m_repeater') ): the_row();
                        $text_m = get_sub_field('text_m'); ?>
                    <p><?php echo $text_m; ?></p>
                    <?php endwhile; endif; ?>
                    <a href="<?php echo esc_url(home_url('/m/bio-m/')); ?>"><div class="checkmark lottie2" id="size_m"></div></a>
                </label>
            </li>
            <li class="global-choice_item">
                <label class="container_choice-item" id="cci3">
                <?php if( have_rows('choice_l_repeater') ): 
                        while( have_rows('choice_l_repeater') ): the_row();
                        $text_l = get_sub_field('text_l'); ?>
                    <p><?php echo $text_l; ?></p>
                    <?php endwhile; endif; ?>
                    <a href="<?php echo esc_url(home_url('/l/bio-l/')); ?>"><div class="checkmark lottie3" id="size_l"></div></a>
                </label>
            </li>
        </ul>

        <div class="newsletter_front-page">
            <div class="newsletter_front-page-items">
                <div class="newsletter_header">
                    <h2>Be the first to know about my new projects & writings 📪</h2>
                    <input class="ne-btn-close"><span class="ne-close"></span>
                </div>
                
                <input class="newsletter_email" type="text" placeholder="your e-mail" name="mail" required>
                <input class="newsletter_btn" type="submit" value="Sign Up">
                <p>By submitting your email you agree to receive updates about Raphaël Penasa. You can unsubscribe at any time. View our full <a href="#"> Privacy Policy</a>.</p>
            </div>
        </div>
         
    </div>
    <!-- ↑↑↑↑ END CHOICE SML ↑↑↑↑ -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
<script>
    // famous random quotes 
 
    function divrandom() {
  var divtags = $(".randomly");
  if (divtags.length) {
    // Récupérer l'index de la div précédemment affichée depuis le LocalStorage
    var previousDisplay = parseInt(localStorage.getItem("randomDisplay"));
    if (isNaN(previousDisplay) || previousDisplay >= divtags.length) {
      previousDisplay = -1; // Si le LocalStorage est inexistant ou incorrect, afficher une div aléatoire
    }

    // Choisir une nouvelle div aléatoire différente de celle précédemment affichée
    var display = Math.floor(Math.random() * divtags.length);
    while (display === previousDisplay) {
      display = Math.floor(Math.random() * divtags.length);
    }

    // Enregistrer l'index de la div actuellement affichée dans le LocalStorage
    localStorage.setItem("randomDisplay", display);

    // Afficher la div sélectionnée et masquer les autres
    for (var i = 0; i < divtags.length; i++) {
      if (i !== display) {
        $(divtags[i]).hide();
      }
    }
  }
};
    // random quotes sml

    function randomizeElementContent(containerSelector) {
  var containers = document.querySelectorAll(containerSelector);
  containers.forEach(function(container) {
    var paragraphs = container.querySelectorAll(".container_choice-item p");
    if (paragraphs.length > 1) {
      // Cacher tous les paragraphes
      paragraphs.forEach(function(paragraph) {
        paragraph.style.display = "none";
      });

      // Choisir un paragraphe aléatoire à afficher
      var randomIndex = Math.floor(Math.random() * paragraphs.length);
      paragraphs[randomIndex].style.display = "block";
    }
  });
}

// Appel de la fonction pour chaque ensemble d'éléments
document.addEventListener("DOMContentLoaded", function() {
  randomizeElementContent(".container_choice-item#cci1");
  randomizeElementContent(".container_choice-item#cci2");
  randomizeElementContent(".container_choice-item#cci3");
});






    // lottie animation
let iconCheck = document.querySelector(".lottie");
if (iconCheck) {

let animationCheck = bodymovin.loadAnimation({
    container: iconCheck,
    loop: false,
    autoplay: false,
    path: "<?php echo get_template_directory_uri(); ?>/json/check.json"
});

var directionCheck = 1;
iconCheck.addEventListener('mouseenter', (e) => {
animationCheck.setDirection(directionCheck);
animationCheck.play();
});

iconCheck.addEventListener('mouseleave', (e) => {
animationCheck.setDirection(-directionCheck);
animationCheck.play();
});

let iconCheck2 = document.querySelector(".lottie2");
let animationCheck2 = bodymovin.loadAnimation({
    container: iconCheck2,
    loop: false,
    autoplay: false,
    path: "<?php echo get_template_directory_uri(); ?>/json/check.json"
});

var directionCheck2 = 1;
iconCheck2.addEventListener('mouseenter', (e) => {
animationCheck2.setDirection(directionCheck2);
animationCheck2.play();
});

iconCheck2.addEventListener('mouseleave', (e) => {
animationCheck2.setDirection(-directionCheck2);
animationCheck2.play();
});

let iconCheck3 = document.querySelector(".lottie3");
let animationCheck3 = bodymovin.loadAnimation({
    container: iconCheck3,
    loop: false,
    autoplay: false,
    path: "<?php echo get_template_directory_uri(); ?>/json/check.json"
});

var directionCheck3 = 1;
iconCheck3.addEventListener('mouseenter', (e) => {
animationCheck3.setDirection(directionCheck3);
animationCheck3.play();
});

iconCheck3.addEventListener('mouseleave', (e) => {
animationCheck3.setDirection(-directionCheck3);
animationCheck3.play();
});

const sb = document.querySelectorAll('#size_s, #size_m, #size_l')
sb.onclick = (event) => {
	event.preventDefault();
	// show the selected index
	alert(sb);
};

}
</script>
<?php get_footer(); ?>