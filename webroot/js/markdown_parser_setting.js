$.extend(mySettings, {
  previewParser: function(content) {
    return Markdown(content);
  }
});
