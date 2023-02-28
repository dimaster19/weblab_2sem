
//  require('./bootstrap');

// import { createApp } from 'vue';
// import FileUploader from './components/FileUploaderComponent.vue';

// let app=createApp({})
// app.component('file-uploader-component' , FileUploader);

// app.mount("#app")


require('./bootstrap');

import { createApp } from 'vue';
import SignUp from './components/RegisterComponent.vue';
import SignIn from './components/LoginComponent.vue';
import Cabinet from './components/CabinetComponent.vue';
import ViewData from './components/ViewDataComponent.vue';
import FileUploader from './components/FileUploaderComponent.vue';


import DropZone from 'dropzone-vue';
import Paginate from "vuejs-paginate-next";

import 'dropzone-vue/dist/dropzone-vue.common.css';
import axios from 'axios';
import VueAxios from 'vue-axios';
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap";


let app=createApp()
app.component('Paginate', Paginate)
app.component('signup', SignUp)
app.component('signin', SignIn)
app.component('cabinet', Cabinet)
app.component('view-data', ViewData)
app.component('drop-zone', FileUploader)

app.use(DropZone).mount('#app');


