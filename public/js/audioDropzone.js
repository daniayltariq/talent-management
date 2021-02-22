function render_audiodropzone(store_url) {
    var audio_dropzone = new Dropzone(
        //id of drop zone element 1
        '#audioDropzone', {
        url: store_url,
        maxFilesize: 12, // MB
        acceptedFiles: 'audio/mp3,audio/mpeg,audio/wav',
        dictDefaultMessage: "Drag & Drop Your File(s) Here or click to upload.<br> i.e .mp3 .mpeg .wav",
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

            if (validAudioTypes.includes(fileType)) {
                formData.append('type', 'audio');
            }
        },
        success: function (file, response) {
            console.log(file);
            if (response.name !== null) {
                $('#audioDropzone').append('<input type="hidden" name="document[]" value="' + response.name + '">')
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
                    $('#audioDropzone').find('input[name="document[]"][value="' + name + '"]').remove()
                },
                error: function (e) {
                    console.log(e);
                }
            });


        },
        init: function (file) {

            var myDropzone = this;
            const validAudioTypes = ['audio/mp3', 'audio/mpeg', 'audio/wav'];

            this.on("maxfilesexceeded", function (file) {
                toastr.error("No more files please!");
            });
            /* this.on('addedfile', function (file) {
                console.log($('#audioDropzone')[0].dropzone.options.maxFiles);
                if (validAudioTypes.includes(file.type)) {
                    sendAudio(file);
                }
            }); */


        }
    }
    );
}