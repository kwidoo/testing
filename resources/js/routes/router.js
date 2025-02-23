import Screen1 from '@/components/Screen1.vue';
import Screen2 from '@/components/Screen2.vue';
import Screen3 from '@/components/Screen3.vue';
import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    {
        path: '/',
        name: 'Screen1',
        component: Screen1
    },
    {
        path: '/screen2',
        name: 'Screen2',
        component: Screen2
    },
    {
        path: '/screen3',
        name: 'Screen3',
        component: Screen3
    }
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    console.log('to', to);
    console.log('from', from);
    next();
});

export default router;
