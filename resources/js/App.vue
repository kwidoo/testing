<template>
    <div class="flex flex-row w-full h-screen">
        <div class="flex flex-col w-1/4 bg-sky-300">
            <router-link to="/">Screen1</router-link>
            <router-link to="/screen2">Screen2</router-link>
            <router-link to="/screen3">Screen3</router-link>
        </div>
        <div class="w-3/4 bg-lime-200">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
export default {
    name: "App",
    setup() {
        return {
            //
        };
    },
};
</script>
