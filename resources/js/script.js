$(function () {
  ///////////////////////////menu/////////////////////////////////

  var nav = $('#header');

  $(window).scroll(function () {
    if ($(this).scrollTop() > 84) {
      $('#header').addClass("bg_white");
    } else {
      $('#header').removeClass("bg_white");
    }
  });

  $(document).on("mouseover", "#header", function () {
    $('#header').css("background-color", "#fff");
  });

  $(document).on("mouseout", "#header", function () {
    $('#header').css("background-color", "inherit");
  });

  $(".mob-menu-btn").click(function () {
    $(".mob-menu-wrapper").slideToggle();
    $(".top").toggleClass('active-top');
    $(".bottom").toggleClass('active-bottom');
  });

  ////////////////////////marcquee///////////////////////////////

  $('.marquee').marquee({
    duration: 30000,
    startVisible: true,
    duplicated: true
  });

  ///////////////////////////typed//////////////////////////////

  $("#typing").typed({
    strings: [" <b>WhatsApp.</b>", " <b>Telegram.</b>"],
    typeSpeed: 70,
    backDelay: 1500,
    startDelay: 0,
    loop: true,
    contentType: 'html',
  });

  /////////////////////////////img blocks///////////////////////

  $(window).scroll(function () {
    $('#bl1').addClass("img-active");

    if (($(window).scrollTop() > $('#im1').offset().top - $('#im1').outerHeight()) && ($(window).scrollTop() < $('#im2').offset().top - $('#im2').outerHeight())) {
      $('#bl1').addClass("img-active");
      $('#bl1').removeClass("img-inactive");
      $('#bl2').removeClass("img-active");
      $('#bl3').removeClass("img-active");
      $('#bl2').addClass("img-inactive");
      $('#bl3').addClass("img-incative");
    }

    if (($(window).scrollTop() > $('#im2').offset().top - $('#im2').outerHeight()) && ($(window).scrollTop() < $('#im3').offset().top - $('#im3').outerHeight())) {
      $('#bl1').removeClass("img-active");
      $('#bl1').addClass("img-inactive");
      $('#bl2').removeClass("img-inactive");
      $('#bl2').addClass("img-active");
      $('#bl3').addClass("img-incative");
      $('#bl3').removeClass("img-active");
    }

    if ($(window).scrollTop() > $('#im3').offset().top - $('#im3').outerHeight()) {
      $('#bl1').removeClass("img-active");
      $('#bl2').removeClass("img-active");
      $('#bl2').addClass("img-inactive");
      $('#bl3').addClass("img-active");
    }
  });

  ///////////////////////////////////////////////////////////
});





