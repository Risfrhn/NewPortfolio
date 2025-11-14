import './assets/main.css'
import '@fortawesome/fontawesome-free/css/all.css'
import { createApp } from 'vue'
import { createPinia } from 'pinia'


import App from './App.vue'
import router from './router'

import "flowbite";
import { initFlowbite } from "flowbite";
router.afterEach(() => {
  setTimeout(() => {
    initFlowbite();
  }, 0);
});

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
