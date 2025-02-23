<template>
    <div class="container">
        <h1>This is screen 1</h1>
        <table v-if="table.length > 0" class="table-auto">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>note</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(row, index) in table" :key="index">
                    <td>{{ row.id }}</td>
                    <td>{{ row.title }}</td>
                    <td>{{ row.status }}</td>
                    <td>{{ row.note }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from "axios";
import { onMounted, ref } from "vue";
export default {
    name: "Screen1",
    setup() {
        const results = async () => {
            const response = await axios.get("http://localhost:8000/api/table");
            return response.data;
        };
        const table = ref([]);
        onMounted(async () => {
            table.value = await results();
        });
        onMounted;
        return {
            table,
        };
    },
};
</script>
