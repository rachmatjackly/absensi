function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $("#profileImage").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
$("#imgProfile").change(function () {
  readURL(this);
});
