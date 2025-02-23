<template>
    <div class="container mx-auto p-6">
        <div class="flex flex-col w-3/4 mx-auto">
            <div class="w-full flex flex-col justify-between my-6">
                <h4 class="text-lg font-bold">Search</h4>
                <input
                    type="text"
                    class="border border-gray-400 w-1/3 p-2 rounded-md"
                    placeholder="Search"
                    v-model="searchQuery"
                    @keyup.enter="performSearch"
                />
            </div>

            <div
                v-if="images.length > 0"
                class="w-full flex flex-col items-center"
            >
                <img
                    :src="images[currentIndex].urls.regular"
                    :alt="images[currentIndex].alt_description"
                    class="rounded-lg shadow-lg w-full max-w-2xl h-auto"
                />
                <p class="mt-2 text-gray-600">
                    {{ images[currentIndex].description || "No Description" }}
                </p>

                <div class="flex justify-between mt-4 w-full max-w-md">
                    <button
                        @click="prevImage"
                        :disabled="currentIndex === 0"
                        class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 disabled:opacity-50"
                    >
                        ← Prev
                    </button>
                    <button
                        @click="nextImage"
                        :disabled="currentIndex === images.length - 1"
                        class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400 disabled:opacity-50"
                    >
                        Next →
                    </button>
                </div>
            </div>

            <p v-else class="text-center text-gray-500 mt-4">
                No results found
            </p>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import { ref } from "vue";

export default {
    setup() {
        const searchQuery = ref("");
        const images = ref([]);
        const currentIndex = ref(0);
        const per_page = 10;
        const accessKey = `${import.meta.env.VITE_UNSPLASH_ACCESS_KEY}`; // Replace with your actual API key

        const performSearch = async () => {
            if (!searchQuery.value) return;
            try {
                const response = await axios.get(
                    "https://api.unsplash.com/search/photos",
                    {
                        params: {
                            query: searchQuery.value,
                            per_page,
                        },
                        headers: {
                            Authorization: `Client-ID ${accessKey}`,
                        },
                    }
                );

                images.value = response.data.results;
                currentIndex.value = 0;
            } catch (error) {
                console.error("Error fetching images:", error);
            }
        };

        const nextImage = () => {
            if (currentIndex.value < images.value.length - 1) {
                currentIndex.value++;
            }
        };

        const prevImage = () => {
            if (currentIndex.value > 0) {
                currentIndex.value--;
            }
        };

        return {
            searchQuery,
            images,
            currentIndex,
            performSearch,
            nextImage,
            prevImage,
        };
    },
};
</script>

<style scoped>
button {
    transition: background-color 0.2s;
}
</style>
