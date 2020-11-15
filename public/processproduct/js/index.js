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

   })

// SHOW /HIDE Menu on click

  $(document).ready(function () {
  
    $('#doorclick').click(function(){
      $('.menu').toggle();
    });

    $("#doorclick").mouseup(function() {
      if($('.menu').is(':visible') === false){
        $('.arc').css({ 'background-color': 'white'});
      }
      else {$('.arc').css({ 'background-color': 'white'});}
    });
  });

// LINK PREVIEW ON HOVER

// $(document).ready(function () {
//   $(function() {
//               $('.textcontainer a').miniPreview({ prefetch: 'parenthover' });
//    });
// });