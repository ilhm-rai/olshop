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

function previewPassword(elem, id) {
  const iconEye = elem.lastChild;
  // const elmPassword =
  //   elem.parentElement.parentElement.parentElement.firstElementChild;
  const elmPassword = document.getElementById(id);
  if (iconEye.classList.contains("fa-eye-slash")) {
    iconEye.classList.replace("fa-eye-slash", "fa-eye");
    elmPassword.setAttribute("type", "text");
  } else {
    iconEye.classList.replace("fa-eye", "fa-eye-slash");
    elmPassword.setAttribute("type", "password");
  }
}

function openDeleteModal(elem, link) {
  const id = $(elem).data("id");
  $("#valueId").attr("value", id);
  $("#formLinkDelete").attr("action", link);
}
