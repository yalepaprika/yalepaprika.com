
  // <!-- Randomize order on load -->
$(document).ready(function () {
  var cards = $(".quote");
  for(var i = 0; i < cards.length; i++){
      var target = Math.floor(Math.random() * cards.length -1) + 1;
      var target2 = Math.floor(Math.random() * cards.length -1) +1;
      cards.eq(target).before(cards.eq(target2));
  }
});

// <!-- reload on click of title -->

  $(document).ready(function () {
      $('h1').click(function() {
          location.reload();
      });
  });

// change door color
  $(document).ready(function () {
  
    $('#doorclick').click(function(){
      $('.menu').toggle();
      $('.arc').toggleClass('invert');
      $('.hingeb').toggleClass('inverthinge');
      $('.hingel').toggleClass('inverthinge');
      $('.arcmask').toggleClass('invertarcmask');
    });
  });


// DOOR ANIMATION ON SCROLL

   $(document).ready(function () {
      // Remember the common values to improve performance
      var $sqr = $('.hingel'),
          $arc = $('.arcmask'),
          $body = $(document.body),
          bodyHeight = $body.height(),
          windowHeight = $(window).height();
          scrollHeight = $(document).height();

      $(window).scroll(function () {
 
         // Calculate the degrees of rotation based on the scrolled portion,
         // the height of the visible part, and height of the whole document
         var top = document.documentElement.scrollTop || document.body.scrollTop,
             rot = (top / ($(document).height() - $(window).height()) * 90);
             arcrot = ((top / ($(document).height() - $(window).height()) * 90)-90);

         // Check if overshooting a full rotation
         // if (rot > 360) {
         //    rot = 360;
         // }
 
         // Rotate the box
         $sqr.css({ 'transform': 'rotate(' + rot + 'deg)'});
        //$sqr.html('<div>' + rot.toFixed() + ' &deg;</div>');
         $arc.css({ 'transform': 'translate(0px, -7px) rotate(' + arcrot + 'deg)'});

      });


 // REDIRECT PAGE when clicked

  

  $( document ).ready(function() {
      
      $('.quote').click(function(){

      if ( $( this ).hasClass( "pool" ) ) {
          var id = $(this).attr('id');
         window.location.replace('pool.html#' + id);
      }
        if ( $( this ).hasClass( "bernheimer" ) ) {
           var id = $(this).attr('id');
          window.location.replace('bernheimer.html#' + id);
      }
        if ( $( this ).hasClass( "bernstein" ) ) {
          var id = $(this).attr('id');
          window.location.replace('bernstein.html#' + id);
      }
        if ( $( this ).hasClass( "boyer" ) ) {
        var id = $(this).attr('id');
         window.location.replace('boyer.html#' + id);
      }
        if ( $( this ).hasClass( "chakrabarti" ) ) {
          var id = $(this).attr('id');
          window.location.replace('chakrabarti.html#' + id);
      }
        if ( $( this ).hasClass( "frug" ) ) {
          var id = $(this).attr('id');
          window.location.replace('frug.html#' + id);
      }
        if ( $( this ).hasClass( "lemar" ) ) {
          var id = $(this).attr('id');
          window.location.replace('lemar.html#' + id);
      }    
        if ( $( this ).hasClass( "pontillo" ) ) {
          var id = $(this).attr('id');
          window.location.replace('pontillo.html#' + id);
      }
        if ( $( this ).hasClass( "hyde" ) ) {
         var id = $(this).attr('id');
         window.location.replace('hyde.html#' + id);
      }
      
      });
    });
});


   // });

   // land on tag at selected part


  