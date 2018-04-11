$(document).ready(function() {
  $(".relateditems").mouseenter(function(e) {
    $(e.delegateTarget).css("webkit-filter", "grayscale(1)");
    $(e.delegateTarget).children().show();
  });
  $(".relateditems").mouseleave(function(e) {
    $(e.delegateTarget).css("webkit-filter", "grayscale(0)");
    $(e.delegateTarget).children().hide();
  });
});