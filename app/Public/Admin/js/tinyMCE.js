tinymce.init({
    selector: '.mytextarealight',
    toolbar: 'undo redo | bold italic',
    menubar: '',
    height: 250,
    setup: function (editor) {
      editor.on('change', function () {
          editor.save();
      });
  }

  });

  tinymce.init({
    selector: '#mytextarea',
    menubar: '',
    height: 450,
    setup: function (editor) {
      editor.on('change', function () {
          editor.save();
      });
  }
  });
