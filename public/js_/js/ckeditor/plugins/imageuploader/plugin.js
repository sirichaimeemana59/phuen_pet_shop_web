// Copyright (c) 2015, Fujana Solutions - Moritz Maleck. All rights reserved.
// For licensing, see LICENSE.md

CKEDITOR.plugins.add( 'imageuploader', {
    init: function( editor ) {
        editor.config.filebrowserUploadUrl = '../../js/ckeditor/plugins/imageuploader/imgupload.php';
        editor.config.filebrowserBrowseUrl = '../../js/ckeditor/plugins/imageuploader/imgbrowser.php';
    }
});