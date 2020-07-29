$navbar = $(".navbar-customer");
$(window).scroll(function (e) {
  if ($(document).scrollTop() > 0) {
    $navbar.addClass("shadow-sm");
  } else {
    $navbar.removeClass("shadow-sm");
  }
});

function previewImage() {
  const picture = document.querySelector("#picture");
  const pictureLabel = document.querySelector(".custom-file-label");
  const imgPreview = document.querySelector(".img-preview");

  pictureLabel.textContent = picture.files[0].name;

  const filePicture = new FileReader();
  filePicture.readAsDataURL(picture.files[0]);

  filePicture.onload = function (e) {
    imgPreview.src = e.target.result;
  };
}
