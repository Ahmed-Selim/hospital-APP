require('./bootstrap');

import Alpine from 'alpinejs';
import router from './router/router' ;
import Doctorsindex from './components/doctors/DoctorsIndex' ;
import { createApp } from "vue" ;

window.Alpine = Alpine;

Alpine.start();


createApp({
    components: {
        Doctorsindex
    }
}).use(router).mount('#app')