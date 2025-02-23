<template>
    <div class="flex flex-row w-full h-screen">
        <div class="flex flex-col w-1/4 bg-sky-300 text-lg items-center">
            <router-link
                to="/"
                class="mb-2 mt-5"
                :class="{ 'font-bold': $route.path === '/' }"
                >Screen1</router-link
            >
            <router-link
                to="/screen2"
                class="my-2"
                :class="{ 'font-bold': $route.path === '/screen2' }"
                >Screen2</router-link
            >
            <router-link
                to="/screen3"
                class="my-2"
                :class="{ 'font-bold': $route.path === '/screen3' }"
                >Screen3</router-link
            >
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
