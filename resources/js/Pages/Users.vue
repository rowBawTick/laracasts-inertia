<template>
    <Pagination :links="paginatedUsers.links" class="my-6"></Pagination>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr v-for="user in paginatedUsers.data" :key="user.id">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ user.name }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <Link :href="`/users/${user.id}/edit`" class="text-indigo-600 hover:text-indigo-900">
                                    Edit
                                </Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- To allow for scrolling and then preserve the scroll position-->
    <div style="margin-top: 500px">
        <p>The current time is {{ time }}</p>
        <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
    </div>
</template>

<script>
// KU Share: normal <script>, executed in module scope (only once)
// import Layout from "@/js/Layouts/Layout.vue";

// KU Share: Declare additional options - unfortunately can't use layout option with composition API
// Use the layout option to override the default (admin menu)
export default {
    // layout: Layout,
}
</script>

<script setup>
import Pagination from "@/js/Shared/Pagination.vue";
// KU Share: executed in setup() scope (for each instance)

// KU Share: Can use <script setup> (syntactic sugar for manually exporting an object that declares a setup method)
// Then you don't need to define components (composition API)
defineProps({
    paginatedUsers: Object,
    users: Array,
    usersOld: Array,
    time: String,
});
</script>

<style scoped>

</style>
