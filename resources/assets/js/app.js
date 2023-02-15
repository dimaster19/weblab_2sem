require('./bootstrap')

import { createApp } from 'vue'
import HelloWorld from './components/FileUploaderComponent'

const app = createApp({})

app.component('dropzone', HelloWorld)

app.mount('#app')

