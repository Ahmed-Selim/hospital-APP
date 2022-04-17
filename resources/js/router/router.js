import { createRouter, createWebHistory } from "vue-router" ;

import DoctorsIndex from '../components/doctors/DoctorsIndex' ;
import DoctorsCreate from '../components/doctors/DoctorsCreate' ;
import DoctorsEdit from '../components/doctors/DoctorsEdit' ;

const routes = [
    {
        path: '/dashboard',
        name: 'doctors.index',
        component: DoctorsIndex
    },
    {
        path: '/doctors/create',
        name: 'doctors.create',
        component: DoctorsCreate
    },
    {
        path: '/doctors/:id/edit',
        name: 'doctors.edit',
        component: DoctorsEdit,
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})