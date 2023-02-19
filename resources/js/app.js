
//  require('./bootstrap');

// import { createApp } from 'vue';
// import FileUploader from './components/FileUploaderComponent.vue';

// let app=createApp({})
// app.component('file-uploader-component' , FileUploader);

// app.mount("#app")


require('./bootstrap');

import { createApp } from 'vue';
import DropZone from 'dropzone-vue';
import 'dropzone-vue/dist/dropzone-vue.common.css';


import App from './App.vue';

let app=createApp(App)
app.use(DropZone).mount('#app');


