import { createApp } from 'vue';
import router from './routes/router.js';
import App from './App.vue';

import '../css/tailwind.css';

const app = createApp(App);

app.use(router);

app.mount('#app');
