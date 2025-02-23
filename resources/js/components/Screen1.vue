<template>
    <div class="container">
        <div class="flex flex-col w-3/4 mx-auto">
            <div class="w-full flex flex-col justify-between my-6">
                <h4>Search</h4>
                <input
                    type="text"
                    class="border border-gray-400 w-1/3"
                    placeholder="Search"
                    v-model="searchQuery"
                    @keyup="onKeyUp"
                    @keyup.enter="performSearch"
                />
            </div>
            <table
                class="w-full table-auto border-collapse border border-gray-400 mx-auto"
            >
                <thead>
                    <tr>
                        <th class="border border-gray-400">Id</th>
                        <th class="border border-gray-400">Title</th>
                        <th class="border border-gray-400">Status</th>
                        <th class="border border-gray-400">Note</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="(row, index) in table"
                        :key="index"
                        class="text-center bg-sky-300"
                    >
                        <td class="border border-gray-400">{{ row.id }}</td>
                        <td class="border border-gray-400">{{ row.title }}</td>
                        <td class="border border-gray-400">{{ row.status }}</td>
                        <td class="border border-gray-400">{{ row.note }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { onMounted, ref } from "vue";

export default {
    name: "Screen1",
    setup() {
        const searchQuery = ref("");
        const table = ref([]);
        let timeout = null;

        const fetchResults = async (query = "") => {
            try {
                const response = await axios.get(
                    "http://localhost:8000/api/table",
                    {
                        params: { search: query },
                    }
                );
                table.value = response.data.data;
            } catch (error) {
                console.error("Error fetching data:", error);
                table.value = [];
            }
        };

        const onKeyUp = () => {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                performSearch();
            }, 300);
        };

        const performSearch = () => {
            if (searchQuery.value.trim() === "") {
                fetchResults();
            } else {
                fetchResults(searchQuery.value);
            }
        };

        onMounted(() => {
            fetchResults();
        });

        return {
            searchQuery,
            table,
            onKeyUp,
            performSearch,
        };
    },
};
</script>
