$navbar = $(".navbar-customer");
$(window).scroll(function (e) {
  if ($(document).scrollTop() > 0) {
    $navbar.addClass("shadow-sm");
  } else {
    $navbar.removeClass("shadow-sm");
  }
});
