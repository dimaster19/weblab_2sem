
 require('./bootstrap');

import { createApp } from 'vue';
import FileUploader from './components/FileUploaderComponent.vue';

let app=createApp({})
app.component('file-uploader-component' , FileUploader);

app.mount("#app")