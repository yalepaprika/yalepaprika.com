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
        $('.arc').css({ 'background-color': 'darkblue'});
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


// MAKE HIGHLIGHT APPEAR FROM TAG PAGE

$(document).ready(function () {

  var hash = location.hash.substr(1);

  if ( hash === 'one') {
    $('#one').css('background-color', 'darkblue');
    $('#one').css('color', 'white');
    $('#one').children().css('color', 'white');
  };

if ( hash === 'two') {
    $('#two').css('background-color', 'darkblue');
    $('#two').css('color', 'white');
    $('#two').children().css('color', 'white');
  };

  if ( hash === 'three') {
    $('#three').css('background-color', 'darkblue');
    $('#three').css('color', 'white');
    $('#three').children().css('color', 'white');
  };

  if ( hash === 'four') {
    $('#four').css('background-color', 'darkblue');
    $('#four').css('color', 'white');
    $('#four').children().css('color', 'white');
  };

  if ( hash === 'five') {
    $('#five').css('background-color', 'darkblue');
    $('#five').css('color', 'white');
    $('#five').children().css('color', 'white');
  };

  if ( hash === 'six') {
    $('#six').css('background-color', 'darkblue');
    $('#six').css('color', 'white');
    $('#six').children().css('color', 'white');
  };

  if ( hash === 'seven') {
    $('#seven').css('background-color', 'darkblue');
    $('#seven').css('color', 'white');
    $('#seven').children().css('color', 'white');
  };

  if ( hash === 'eight') {
    $('#eight').css('background-color', 'darkblue');
    $('#eight').css('color', 'white');
    $('#eight').children().css('color', 'white');
  };

  if ( hash === 'nine') {
    $('#nine').css('background-color', 'darkblue');
    $('#nine').css('color', 'white');
    $('#nine').children().css('color', 'white');
  };

  if ( hash === 'ten') {
    $('#ten').css('background-color', 'darkblue');
    $('#ten').css('color', 'white');
    $('#ten').children().css('color', 'white');
  };

  if ( hash === 'eleven') {
    $('#eleven').css('background-color', 'darkblue');
    $('#eleven').css('color', 'white');
    $('#eleven').children().css('color', 'white');
  };

  if ( hash === 'twelve') {
    $('#twelve').css('background-color', 'darkblue');
    $('#twelve').css('color', 'white');
    $('#twelve').children().css('color', 'white');
  };

  if ( hash === 'thirteen') {
    $('#thirteen').css('background-color', 'darkblue');
    $('#thirteen').css('color', 'white');
    $('#thirteen').children().css('color', 'white');
  };

  if ( hash === 'fourteen') {
    $('#fourteen').css('background-color', 'darkblue');
    $('#fourteen').css('color', 'white');
    $('#fourteen').children().css('color', 'white');
  };

  if ( hash === 'fifteen') {
    $('#fifteen').css('background-color', 'darkblue');
    $('#fifteen').css('color', 'white');
    $('#fifteen').children().css('color', 'white');
  };

  if ( hash === 'sixteen') {
    $('#sixteen').css('background-color', 'darkblue');
    $('#sixteen').css('color', 'white');
    $('#sixteen').children().css('color', 'white');
  };

  if ( hash === 'seventeen') {
    $('#seventeen').css('background-color', 'darkblue');
    $('#seventeen').css('color', 'white');
    $('#seventeen').children().css('color', 'white');
  };

  if ( hash === 'eighteen') {
    $('#eighteen').css('background-color', 'darkblue');
    $('#eighteen').css('color', 'white');
    $('#eighteen').children().css('color', 'white');
  };

  if ( hash === 'nineteen') {
    $('#nineteen').css('background-color', 'darkblue');
    $('#nineteen').css('color', 'white');
    $('#nineteen').children().css('color', 'white');
  };

  if ( hash === 'twenty') {
    $('#twenty').css('background-color', 'darkblue');
    $('#twenty').css('color', 'white');
    $('#twenty').children().css('color', 'white');
  };

  if ( hash === 'twentyone') {
    $('#twentyone').css('background-color', 'darkblue');
    $('#twentyone').css('color', 'white');
    $('#twentyone').children().css('color', 'white');
  };

  if ( hash === 'twentytwo') {
    $('#twentytwo').css('background-color', 'darkblue');
    $('#twentytwo').css('color', 'white');
    $('#twentytwo').children().css('color', 'white');
  };

  if ( hash === 'twentythree') {
    $('#twentythree').css('background-color', 'darkblue');
    $('#twentythree').css('color', 'white');
    $('#twentythree').children().css('color', 'white');
  };

  if ( hash === 'twentyfour') {
    $('#twentyfour').css('background-color', 'darkblue');
    $('#twentyfour').css('color', 'white');
    $('#twentyfour').children().css('color', 'white');
  };

  if ( hash === 'twentyfive') {
    $('#twentyfive').css('background-color', 'darkblue');
    $('#twentyfive').css('color', 'white');
    $('#twentyfive').children().css('color', 'white');
  };

  if ( hash === 'twentysix') {
    $('#twentysix').css('background-color', 'darkblue');
    $('#twentysix').css('color', 'white');
    $('#twentysix').children().css('color', 'white');
  };

  if ( hash === 'twentyseven') {
    $('#twentyseven').css('background-color', 'darkblue');
    $('#twentyseven').css('color', 'white');
    $('#twentyseven').children().css('color', 'white');
  };

  if ( hash === 'twentyeight') {
    $('#twentyeight').css('background-color', 'darkblue');
    $('#twentyeight').css('color', 'white');
    $('#twentyeight').children().css('color', 'white');
  };

  if ( hash === 'twentynine') {
    $('#twentynine').css('background-color', 'darkblue');
    $('#twentynine').css('color', 'white');
    $('#twentynine').children().css('color', 'white');
  };

  if ( hash === 'thirty') {
    $('#thirty').css('background-color', 'darkblue');
    $('#thirty').css('color', 'white');
    $('#thirty').children().css('color', 'white');
  };

  if ( hash === 'thirtyone') {
    $('#thirtyone').css('background-color', 'darkblue');
    $('#thirtyone').css('color', 'white');
    $('#thirtyone').children().css('color', 'white');
  };

  if ( hash === 'thirtytwo') {
    $('#thirtytwo').css('background-color', 'darkblue');
    $('#thirtytwo').css('color', 'white');
    $('#thirtytwo').children().css('color', 'white');
  };

  if ( hash === 'thirtythree') {
    $('#thirtythree').css('background-color', 'darkblue');
    $('#thirtythree').css('color', 'white');
    $('#thirtythree').children().css('color', 'white');
  };


  });

$( document ).ready(function() {

  $('.tagone').mouseenter(function(){
      $( "#one" ).css('background-color', 'darkblue');
      $( "#one" ).css('color', 'white');
      $('#one').children().css('color', 'white');
  });
  $('.tagone').mouseleave(function(){
      $( "#one" ).css('background-color', 'initial');
      $( "#one" ).css('color', 'initial');
      $('#one').children().css('color', 'initial');
  });
  $('.tagtwo').mouseenter(function(){
      $( "#two" ).css('background-color', 'darkblue');
      $( "#two" ).css('color', 'white');
      $('#two').children().css('color', 'white');
  });
  $('.tagtwo').mouseleave(function(){
      $( "#two" ).css('background-color', 'initial');
      $( "#two" ).css('color', 'initial');
      $('#two').children().css('color', 'initial');
  });

  $('.tagthree').mouseenter(function(){
      $( "#three" ).css('background-color', 'darkblue');
      $( "#three" ).css('color', 'white');
      $('#three').children().css('color', 'white');
  });
  $('.tagthree').mouseleave(function(){
      $( "#three" ).css('background-color', 'initial');
      $( "#three" ).css('color', 'initial');
      $('#three').children().css('color', 'initial');
  });

    $('.tagfour').mouseenter(function(){
      $( "#four" ).css('background-color', 'darkblue');
      $( "#four" ).css('color', 'white');
      $('#four').children().css('color', 'white');
  });
  $('.tagfour').mouseleave(function(){
      $( "#four" ).css('background-color', 'initial');
      $( "#four" ).css('color', 'initial');
      $('#four').children().css('color', 'initial');
  });

    $('.tagfive').mouseenter(function(){
      $( "#five" ).css('background-color', 'darkblue');
      $( "#five" ).css('color', 'white');
      $('#five').children().css('color', 'white');
  });
  $('.tagfive').mouseleave(function(){
      $( "#five" ).css('background-color', 'initial');
      $( "#five" ).css('color', 'initial');
      $('#five').children().css('color', 'initial');
  });

    $('.tagsix').mouseenter(function(){
      $( "#six" ).css('background-color', 'darkblue');
      $( "#six" ).css('color', 'white');
      $('#six').children().css('color', 'white');
  });
  $('.tagsix').mouseleave(function(){
      $( "#six" ).css('background-color', 'initial');
      $( "#six" ).css('color', 'initial');
      $('#six').children().css('color', 'initial');
  });

    $('.tagseven').mouseenter(function(){
      $( "#seven" ).css('background-color', 'darkblue');
      $( "#seven" ).css('color', 'white');
      $('#seven').children().css('color', 'white');
  });
  $('.tagseven').mouseleave(function(){
      $( "#seven" ).css('background-color', 'initial');
      $( "#seven" ).css('color', 'initial');
      $('#seven').children().css('color', 'initial');
  });

    $('.tageight').mouseenter(function(){
      $( "#eight" ).css('background-color', 'darkblue');
      $( "#eight" ).css('color', 'white');
      $('#eight').children().css('color', 'white');
  });
  $('.tageight').mouseleave(function(){
      $( "#eight" ).css('background-color', 'initial');
      $( "#eight" ).css('color', 'initial');
      $('#eight').children().css('color', 'initial');
  });

    $('.tagnine').mouseenter(function(){
      $( "#nine" ).css('background-color', 'darkblue');
      $( "#nine" ).css('color', 'white');
      $('#nine').children().css('color', 'white');
  });
  $('.tagnine').mouseleave(function(){
      $( "#nine" ).css('background-color', 'initial');
      $( "#nine" ).css('color', 'initial');
      $('#nine').children().css('color', 'initial');
  });

    $('.tagten').mouseenter(function(){
      $( "#ten" ).css('background-color', 'darkblue');
      $( "#ten" ).css('color', 'white');
      $('#ten').children().css('color', 'white');
  });
  $('.tagten').mouseleave(function(){
      $( "#ten" ).css('background-color', 'initial');
      $( "#ten" ).css('color', 'initial');
      $('#ten').children().css('color', 'initial');
  });

    $('.tageleven').mouseenter(function(){
      $( "#eleven" ).css('background-color', 'darkblue');
      $( "#eleven" ).css('color', 'white');
      $('#eleven').children().css('color', 'white');
  });
  $('.tageleven').mouseleave(function(){
      $( "#eleven" ).css('background-color', 'initial');
      $( "#eleven" ).css('color', 'initial');
      $('#eleven').children().css('color', 'initial');
  });

    $('.tagtwelve').mouseenter(function(){
      $( "#twelve" ).css('background-color', 'darkblue');
      $( "#twelve" ).css('color', 'white');
      $('#twelve').children().css('color', 'white');
  });
  $('.tagtwelve').mouseleave(function(){
      $( "#twelve" ).css('background-color', 'initial');
      $( "#twelve" ).css('color', 'initial');
      $('#twelve').children().css('color', 'initial');
  });

    $('.tagthirteen').mouseenter(function(){
      $( "#thirteen" ).css('background-color', 'darkblue');
      $( "#thirteen" ).css('color', 'white');
      $('#thirteen').children().css('color', 'white');
  });
  $('.tagthirteen').mouseleave(function(){
      $( "#thirteen" ).css('background-color', 'initial');
      $( "#thirteen" ).css('color', 'initial');
      $('#thirteen').children().css('color', 'initial');
  });

    $('.tagfourteen').mouseenter(function(){
      $( "#fourteen" ).css('background-color', 'darkblue');
      $( "#fourteen" ).css('color', 'white');
      $('#fourteen').children().css('color', 'white');
  });
  $('.tagfourteen').mouseleave(function(){
      $( "#fourteen" ).css('background-color', 'initial');
      $( "#fourteen" ).css('color', 'initial');
      $('#fourteen').children().css('color', 'initial');
  });

    $('.tagfifteen').mouseenter(function(){
      $( "#fifteen" ).css('background-color', 'darkblue');
      $( "#fifteen" ).css('color', 'white');
      $('#fifteen').children().css('color', 'white');
  });
  $('.tagfifteen').mouseleave(function(){
      $( "#fifteen" ).css('background-color', 'initial');
      $( "#fifteen" ).css('color', 'initial');
      $('#fifteen').children().css('color', 'initial');
  });

$('.tagsixteen').mouseenter(function(){
      $( "#sixteen" ).css('background-color', 'darkblue');
      $( "#sixteen" ).css('color', 'white');
      $('#sixteen').children().css('color', 'white');
  });
  $('.tagsixteen').mouseleave(function(){
      $( "#sixteen" ).css('background-color', 'initial');
      $( "#sixteen" ).css('color', 'initial');
      $('#sixteen').children().css('color', 'initial');
  });
  $('.tagseventeen').mouseenter(function(){
      $( "#seventeen" ).css('background-color', 'darkblue');
      $( "#seventeen" ).css('color', 'white');
      $('#seventeen').children().css('color', 'white');
  });
  $('.tagseventeen').mouseleave(function(){
      $( "#seventeen" ).css('background-color', 'initial');
      $( "#seventeen" ).css('color', 'initial');
      $('#seventeen').children().css('color', 'initial');
  });

  $('.tageighteen').mouseenter(function(){
      $( "#eighteen" ).css('background-color', 'darkblue');
      $( "#eighteen" ).css('color', 'white');
      $('#eighteen').children().css('color', 'white');
  });
  $('.tageighteen').mouseleave(function(){
      $( "#eighteen" ).css('background-color', 'initial');
      $( "#eighteen" ).css('color', 'initial');
      $('#eighteen').children().css('color', 'initial');
  });

    $('.tagnineteen').mouseenter(function(){
      $( "#nineteen" ).css('background-color', 'darkblue');
      $( "#nineteen" ).css('color', 'white');
      $('#nineteen').children().css('color', 'white');
  });
  $('.tagnineteen').mouseleave(function(){
      $( "#nineteen" ).css('background-color', 'initial');
      $( "#nineteen" ).css('color', 'initial');
      $('#nineteen').children().css('color', 'initial');
  });

    $('.tagtwenty').mouseenter(function(){
      $( "#twenty" ).css('background-color', 'darkblue');
      $( "#twenty" ).css('color', 'white');
      $('#twenty').children().css('color', 'white');
  });
  $('.tagtwenty').mouseleave(function(){
      $( "#twenty" ).css('background-color', 'initial');
      $( "#twenty" ).css('color', 'initial');
      $('#twenty').children().css('color', 'initial');
  });

    $('.tagtwentyone').mouseenter(function(){
      $( "#twentyone" ).css('background-color', 'darkblue');
      $( "#twentyone" ).css('color', 'white');
      $('#twentyone').children().css('color', 'white');
  });
  $('.tagtwentyone').mouseleave(function(){
      $( "#twentyone" ).css('background-color', 'initial');
      $( "#twentyone" ).css('color', 'initial');
      $('#twentyone').children().css('color', 'initial');
  });

    $('.tagtwentytwo').mouseenter(function(){
      $( "#twentytwo" ).css('background-color', 'darkblue');
      $( "#twentytwo" ).css('color', 'white');
      $('#twentytwo').children().css('color', 'white');
  });
  $('.tagtwentytwo').mouseleave(function(){
      $( "#twentytwo" ).css('background-color', 'initial');
      $( "#twentytwo" ).css('color', 'initial');
      $('#twentytwo').children().css('color', 'initial');
  });

    $('.tagtwentythree').mouseenter(function(){
      $( "#twentythree" ).css('background-color', 'darkblue');
      $( "#twentythree" ).css('color', 'white');
      $('#twentythree').children().css('color', 'white');
  });
  $('.tagtwentythree').mouseleave(function(){
      $( "#twentythree" ).css('background-color', 'initial');
      $( "#twentythree" ).css('color', 'initial');
      $('#twentythree').children().css('color', 'initial');
  });

    $('.tagtwentyfour').mouseenter(function(){
      $( "#twentyfour" ).css('background-color', 'darkblue');
      $( "#twentyfour" ).css('color', 'white');
      $('#twentyfour').children().css('color', 'white');
  });
  $('.tagtwentyfour').mouseleave(function(){
      $( "#twentyfour" ).css('background-color', 'initial');
      $( "#twentyfour" ).css('color', 'initial');
      $('#twentyfour').children().css('color', 'initial');
  });

    $('.tagtwentyfive').mouseenter(function(){
      $( "#twentyfive" ).css('background-color', 'darkblue');
      $( "#twentyfive" ).css('color', 'white');
      $('#twentyfive').children().css('color', 'white');
  });
  $('.tagtwentyfive').mouseleave(function(){
      $( "#twentyfive" ).css('background-color', 'initial');
      $( "#twentyfive" ).css('color', 'initial');
      $('#twentyfive').children().css('color', 'initial');
  });

    $('.tagtwentysix').mouseenter(function(){
      $( "#twentysix" ).css('background-color', 'darkblue');
      $( "#twentysix" ).css('color', 'white');
      $('#twentysix').children().css('color', 'white');
  });
  $('.tagtwentysix').mouseleave(function(){
      $( "#twentysix" ).css('background-color', 'initial');
      $( "#twentysix" ).css('color', 'initial');
      $('#twentysix').children().css('color', 'initial');
  });

    $('.tagtwentyseven').mouseenter(function(){
      $( "#twentyseven" ).css('background-color', 'darkblue');
      $( "#twentyseven" ).css('color', 'white');
      $('#twentyseven').children().css('color', 'white');
  });
  $('.tagtwentyseven').mouseleave(function(){
      $( "#twentyseven" ).css('background-color', 'initial');
      $( "#twentyseven" ).css('color', 'initial');
      $('#twentyseven').children().css('color', 'initial');
  });

    $('.tagtwentyeight').mouseenter(function(){
      $( "#twentyeight" ).css('background-color', 'darkblue');
      $( "#twentyeight" ).css('color', 'white');
      $('#twentyeight').children().css('color', 'white');
  });
  $('.tagtwentyeight').mouseleave(function(){
      $( "#twentyeight" ).css('background-color', 'initial');
      $( "#twentyeight" ).css('color', 'initial');
      $('#twentyeight').children().css('color', 'initial');
  });

    $('.tagtwentynine').mouseenter(function(){
      $( "#twentynine" ).css('background-color', 'darkblue');
      $( "#twentynine" ).css('color', 'white');
      $('#twentynine').children().css('color', 'white');
  });
  $('.tagtwentynine').mouseleave(function(){
      $( "#twentynine" ).css('background-color', 'initial');
      $( "#twentynine" ).css('color', 'initial');
      $('#twentynine').children().css('color', 'initial');
  });

    $('.tagthirty').mouseenter(function(){
      $( "#thirty" ).css('background-color', 'darkblue');
      $( "#thirty" ).css('color', 'white');
      $('#thirty').children().css('color', 'white');
  });
  $('.tagthirty').mouseleave(function(){
      $( "#thirty" ).css('background-color', 'initial');
      $( "#thirty" ).css('color', 'initial');
      $('#thirty').children().css('color', 'initial');
  });

    $('.tagthirtyone').mouseenter(function(){
      $( "#thirtyone" ).css('background-color', 'darkblue');
      $( "#thirtyone" ).css('color', 'white');
      $('#thirtyone').children().css('color', 'white');
  });
  $('.tagthirtyone').mouseleave(function(){
      $( "#thirtyone" ).css('background-color', 'initial');
      $( "#thirtyone" ).css('color', 'initial');
      $('#thirtyone').children().css('color', 'initial');
  });

  $('.tagthirtytwo').mouseenter(function(){
      $( "#thirtytwo" ).css('background-color', 'darkblue');
      $( "#thirtytwo" ).css('color', 'white');
      $('#thirtytwo').children().css('color', 'white');
  });
  $('.tagthirtytwo').mouseleave(function(){
      $( "#thirtytwo" ).css('background-color', 'initial');
      $( "#thirtytwo" ).css('color', 'initial');
      $('#thirtytwo').children().css('color', 'initial');
  });

  $('.tagthirtythree').mouseenter(function(){
      $( "#thirtythree" ).css('background-color', 'darkblue');
      $( "#thirtythree" ).css('color', 'white');
      $('#thirtythree').children().css('color', 'white');
  });
  $('.tagthirtythree').mouseleave(function(){
      $( "#thirtythree" ).css('background-color', 'initial');
      $( "#thirtythree" ).css('color', 'initial');
      $('#thirtythree').children().css('color', 'initial');
  });

});