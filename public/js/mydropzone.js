function render_dropzone(store_url) {
    var myDropzoneTheFirst = new Dropzone(
        //id of drop zone element 1
        '#imageDropzone', {
        url: store_url,
        maxFilesize: 12, // MB
        acceptedFiles: "image/jpg,image/jpeg,image/png",
        dictDefaultMessage: "Drop Your Files here.<br> i.e .jpg .jpeg .png",
        /* maxFiles: function (file, done) {
            if (validImageTypes.includes(file.type)) {
                done("No more images");
            }
            else { done(); }
        }, */
        /* autoProcessQueue: false, */
        accept: function (file, done) {
            console.log("uploaded");
            done();
        },

        renameFile: function (file) {
            let newName = new Date().getTime() + '_' + file.name;
            return newName;
        },
        addRemoveLinks: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        sending: function (file, xhr, formData) {
            const fileType = file.type;
            /* console.log(fileType); */

            if (validImageTypes.includes(fileType)) {
                formData.append('type', 'image');
            }
        },
        success: function (file, response) {
            console.log(file);
            if (response.name !== null) {
                $('#imageDropzone').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.upload.filename] = response.name
                toastr.success('file uploaded');
            }
            else {
                toastr.error('something went wrong');
            }
            console.log(uploadedDocumentMap);

        },
        removedfile: function (file) {
            file.previewElement.remove()
            $.ajax({
                type: 'delete',
                url: "{{ route('account.fileDestroy') }}",
                data: {
                    filename: uploadedDocumentMap[file.upload.filename],
                    _method: 'DELETE',
                },
                success: function (data) {
                    var name = ''
                    if (typeof file.file_name !== 'undefined') {
                        name = file.file_name
                    } else {
                        name = uploadedDocumentMap[file.upload.filename]
                    }
                    $('#imageDropzone').find('input[name="document[]"][value="' + name + '"]').remove()
                },
                error: function (e) {
                    console.log(e);
                }
            });


        },
        init: function (file) {

            /* this.on('addedfile', function (file) {
                setDropzoneImgLimit(file);
            }); */

            this.on("maxfilesexceeded", function (file) {
                toastr.error("No more files please!");
            });

        }
    }
    );
}