$(function() {
  var enableMarkItUp = function() {
    $('textarea.markItUp').markItUp(mySettings);
  };
  $(document).bind('end.pjax', enableMarkItUp);
  enableMarkItUp();
});

