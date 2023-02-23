
//  require('./bootstrap');

// import { createApp } from 'vue';
// import FileUploader from './components/FileUploaderComponent.vue';

// let app=createApp({})
// app.component('file-uploader-component' , FileUploader);

// app.mount("#app")


require('./bootstrap');

import { createApp } from 'vue';
import SignUp from './components/RegisterComponent.vue';
import FileUploader from './components/FileUploaderComponent.vue';
import DropZone from 'dropzone-vue';

import 'dropzone-vue/dist/dropzone-vue.common.css';
import axios from 'axios';
import VueAxios from 'vue-axios';
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";


let app=createApp()
app.component('signup', SignUp)
app.component('drop-zone', FileUploader)
app.use(DropZone).mount('#app');


