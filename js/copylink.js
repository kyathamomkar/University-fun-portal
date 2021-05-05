var $temp = $("<input>");
var $url = $(location).attr('href');

$('#share').on('click', function() {
  $("body").append($temp);
  $temp.val($url).select();
  document.execCommand("copy");
  $temp.remove();
 alert("Link Copied to Clipboard");
})
