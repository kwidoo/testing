<template>
    <div class="container">
        <div
            class="flex flex-col w-1/2 mx-auto justify-center items-center h-full"
        >
            <div
                class="w-full flex flex-col justify-center items-center my-6"
                v-if="!loading"
            >
                <div
                    v-for="(row, index) in fields"
                    :key="index"
                    class="flex flex-row w-full justify-center"
                >
                    <div
                        v-for="(cell, cellIndex) in row"
                        :key="cellIndex"
                        class="w-1/3 h-32 cursor-pointer"
                        :class="{
                            'bg-red-500': cell === 1,
                            'bg-blue-500': cell === 0,
                        }"
                        @click="clickSquare(index, cellIndex)"
                    ></div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";
import { onMounted, ref } from "vue";
export default {
    name: "Screen3",
    setup() {
        const loading = ref(true);

        const fields = ref([]);
        const fetch = async () => {
            try {
                const response = await axios.get(
                    "http://localhost:8000/api/fields"
                );
                fields.value = response.data;
                loading.value = false;
            } catch (error) {
                console.error("Error fetching data:", error);
                fields.value = [];
            }
        };

        onMounted(() => {
            fetch();
        });

        const clickSquare = async (row, col) => {
            const response = await axios.post(
                "http://localhost:8000/api/fields",
                {
                    row,
                    col,
                    previous: fields.value,
                }
            );
            fields.value = response.data;
        };
        return {
            loading,
            fields,
            clickSquare,
        };
    },
};
</script>
