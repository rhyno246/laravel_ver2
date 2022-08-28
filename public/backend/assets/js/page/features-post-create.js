"use strict";
$.uploadPreview({
  input_field: "#image-upload",   // Default: .image-upload
  preview_box: "#image-preview",  // Default: .image-preview
  label_field: "#image-label",    // Default: .image-label
  label_default: "Choose File",   // Default: Choose File
  label_selected: "Change File",  // Default: Change File
  no_label: false,                // Default: false
  success_callback: null          // Default: null
});

$(".choose-tags").select2({
  tags: true,
  tokenSeparators: [","],
});

var options = {
  filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};
CKEDITOR.replace('ckeditor', options);