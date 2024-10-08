<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Pagination from '@/Components/Pagination.vue';
import { Head, Link, router } from '@inertiajs/vue3';

const deleteRow = (id) => {
    if (confirm('Are you sure you want to delete this product?')) {
        router.delete(route('products.destroy', id), {
            preserveScroll: true,
            onSuccess: () => {
                console.log('Product deleted successfully');
            },
        });
    }
}


// defineProps({
//     products: {
//         type: Array,
//         required: true,
//     },
// });
// old before pagination

defineProps({
    products: {
        type: Object,
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
                                <th scope="col" class="px-6 py-3" width="5" >
                                    No
                                </th>
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
                            <tr v-for="(product, index) in products.data" :key="product.id" class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    {{ products.meta.from + index }}
                                </td>
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
                                    <Link :href="route('products.show', product.id)" class="font-medium text-gray-600 hover:underline">Show</Link>
                                    <Link :href="route('products.edit', product.id)" class="font-medium text-blue-600 hover:underline">Edit</Link>
                                    <a href="#" class="font-medium text-red-600 hover:underline" @click.prevent="deleteRow(product.id)">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                   <Pagination :meta="products.meta" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
