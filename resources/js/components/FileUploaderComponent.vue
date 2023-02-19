<!-- 
<template>
    <div>
      <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
    </div>
  </template>
  
  <script>
  import vue2Dropzone from "vue2-dropzone";
  import "vue2-dropzone/dist/vue2Dropzone.min.css";
  export default {
    name: "FileUploader",
    components: {
      vueDropzone: vue2Dropzone
    },
    data: function() {
      return {
        dropzoneOptions: {
          url: "http://127.0.0.1:8000/api/image/upload/store",
          thumbnailWidth: 150,
          maxFilesize: 0.5,
          headers: { "My-Awesome-Header": "header value" }
        }
      };
    },
    props: {
      msg: String
    }
  };
  </script> -->
  
<template>
    <div style="height: 300px; width: 300px; border: 1px solid red; position: relative;">
        <DropZone :maxFiles="Number(10000000000)" url="http://127.0.0.1:8000/file-import" method="POST" :uploadOnDrop="true"
            :multipleUpload="false" :parallelUpload="1" :headers="csrfHeader">
            <input type="hidden" name="csrf-token" :value="csrfToken">
        </DropZone>



    </div>
</template>

<script>
import { defineComponent } from 'vue';
import { DropZone } from 'dropzone-vue';

export default defineComponent({
    components: {
        DropZone,
    },
    name: 'App',
    setup() {
        return {
            csrfToken: document.head.querySelector('meta[name="csrf-token"]').content,
            csrfHeader: {
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
            }
        }
    }
});
</script>