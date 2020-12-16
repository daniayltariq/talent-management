function render_dropzone() {
    var myDropzoneTheFirst = new Dropzone(
        //id of drop zone element 1
        '#imageDropzone', {
        url: "{{ route('account.storeMedia') }}",
        maxFiles: function (file, done) {
            if (validImageTypes.includes(file.type)) {
                done("No more images!");
            }
            else { done(); }
        },
        maxFilesize: 12, // MB
        acceptedFiles: "image/*,.mp4,.mkv,.mov,.wmv,audio/*",
        dictDefaultMessage: "Drop Your Files here.",
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
            else if (validVideoTypes.includes(fileType)) {
                formData.append('type', 'video');
            }
            else if (validAudioTypes.includes(fileType)) {
                formData.append('type', 'audio');
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
            /* var myDropzone = this;
            const validAudioTypes = ['audio/mp3', 'audio/mpeg', 'audio/wav'];
            this.on('addedfile', function(file) {
                if ( validAudioTypes.includes(file.type)) {
                    sendAudio(file);
                }
                else{
                    myDropzone.processQueue();
                }
            }); */

            this.on('addedfile', function (file) {
                setDropzoneImgLimit(file);
            });

            this.on("maxfilesexceeded", function (file) {
                alert("No more files please!");
            });

        }
    }
    );
}