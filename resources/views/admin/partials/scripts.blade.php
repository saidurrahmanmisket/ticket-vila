
{{-- ckeditor cdn  --}}
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script src="https://ticketvilla-admin.netlify.app/assets/js/jquery-3.7.1.min.js"></script>
<script src="https://ticketvilla-admin.netlify.app/assets/js/plugins.js"></script>
<script src="https://ticketvilla-admin.netlify.app/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/@flasher/flasher@1.2.4/dist/flasher.min.js"></script>

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
</script>

@stack('script')
