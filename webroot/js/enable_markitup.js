$(function() {
  $('textarea.markItUp').markItUp(mySettings);
  $(document).bind('end.pjax', function(e){
    $('textarea.markItUp').markItUp(mySettings);
  });
});

