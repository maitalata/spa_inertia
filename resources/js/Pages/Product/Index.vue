<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';


defineProps({
    products: {
        type: Array,
        required: true,
    },
});

</script>

<template>
    <Head title="Manage Products" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex items-center justify-between" >
                <h2 class="text-xl font-semibold leading-tight text-gray-800">Manage Products</h2>
                <Link :href="route('products.create')" class="px-3 py-2.5 text-sm font-medium text-center text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">New Product</Link>
            </div>

        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                        <thead class="text-xs text-gray-700 uppercase border-b bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Product name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Weight
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in products" :key="product.id" class="bg-white border-b hover:bg-gray-50">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ product.name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ product.category.name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ product.price_formatted }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ product.weight }}
                                </td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="#" class="font-medium text-gray-600 hover:underline">Show</a>
                                    <a href="#" class="font-medium text-blue-600 hover:underline">Edit</a>
                                    <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <nav class="flex flex-wrap items-center justify-between px-4 py-2 flex-column md:flex-row" aria-label="Table navigation">
                        <span class="block w-full mb-4 text-sm font-normal text-gray-700 md:mb-0 md:inline md:w-auto">Showing <span class="font-semibold text-gray-700">1-10</span> of <span class="font-semibold text-gray-700">1000</span></span>
                        <ul class="inline-flex h-8 -space-x-px text-sm rtl:space-x-reverse">
                            <li>
                                <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 ms-0 hover:text-gray-700">Previous</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 hover:text-gray-700">1</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 hover:text-gray-700">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page" class="flex items-center justify-center h-8 px-3 text-blue-600 hover:text-blue-700">3</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 hover:text-gray-700">4</a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 hover:text-gray-700">5</a>
                            </li>
                            <li>
                        <a href="#" class="flex items-center justify-center h-8 px-3 leading-tight text-gray-500 hover:text-gray-700">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
