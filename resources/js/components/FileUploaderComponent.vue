<template>
    <div>
        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>

    </div>
</template>

<script>
import vue2Dropzone from "vue2-dropzone";
import "vue2-dropzone/dist/vue2Dropzone.min.css";
export default {
    components: {
        vueDropzone: vue2Dropzone
    },
    data() {
        return {
            dropzoneOptions: {
                url: "/",
                addRemoveLinks: true,
                maxFiles: 1
            },
            fileName: ''
        };
    },
    methods: {
        uploadSuccess(file, response) {
            console.log('File Successfully Uploaded with file name: ' + response.file);
            this.fileName = response.file;
        },
        uploadError(file, message) {
            console.log('An Error Occurred');
        },
        fileRemoved() { }
    }
};
</script>