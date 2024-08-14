
{{-- ckeditor cdn  --}}
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

<script src="https://ticketvilla-admin.netlify.app/assets/js/jquery-3.7.1.min.js"></script>
<script src="https://ticketvilla-admin.netlify.app/assets/js/plugins.js"></script>
<script src="https://ticketvilla-admin.netlify.app/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.1/dist/sweetalert2.all.min.js"></script>
{{-- dropify initilazation --}}
<script>
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click.',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });

        // document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.ck_editor').forEach((editor) => {
            ClassicEditor
                    .create(editor, {
                        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageCaption', 'ImageStyle', 'ImageToolbar', 'ImageUpload', 'MediaEmbed']
                    })
                    .catch(error => {
                        console.error(error);
                    });
        });
</script>

@stack('script')
