
{{-- ckeditor cdn  --}}
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

<script src="https://ticketvilla-admin.netlify.app/assets/js/jquery-3.7.1.min.js"></script>
<script src="https://ticketvilla-admin.netlify.app/assets/js/plugins.js"></script>
<script src="https://ticketvilla-admin.netlify.app/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

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
