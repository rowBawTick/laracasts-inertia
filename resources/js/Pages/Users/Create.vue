<template>
    <Head title="Create User" />

    <h1 class="text-3xl">Create New User</h1>

    <!-- On submit, prevent default action. Instead call submit method in script setup -->
    <form @submit.prevent="submit" method="post" action="/" class="max-w-md mx-auto mt-8">
        <!-- Name -->
        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Name
            </label>

            <input v-model="form.name" type="text" class="border border-gray-400 p-2 w-full"
                   name="name"
                   id="name"
                   required
            >
            <!-- KU Share: To see the failed validation from the server need to remove <input>'s required attribute -->
            <div v-if="errors.name" v-text="errors.name"
                 class="text-red-500 text-xs mt-1"></div>
        </div>

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Email
            </label>

            <input v-model="form.email" type="email"
                   class="border border-gray-400 p-2 w-full"
                   name="email"
                   id="email"
                   required
            >
            <div v-if="errors.email" v-text="errors.email"
                 class="text-red-500 text-xs mt-1"></div>
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                Password
            </label>

            <input v-model="form.password" type="password" class="border border-gray-400 p-2 w-full"
                   name="password"
                   id="password"
                   required
            >
            <div v-if="errors.password" v-text="errors.password"
                 class="text-red-500 text-xs mt-1"></div>
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-700 text-yellow-200 rounded py-2 px-4 hover:bg-blue-500">Submit</button>
        </div>
    </form>


</template>

<script setup>
import { reactive } from 'vue';
import {Inertia} from "@inertiajs/inertia";

defineProps({
    errors: Object
});

let form = reactive({
    name: '',
    email: '',
    password: '',
});

let submit = () => {
    Inertia.post('/users', form);
};

</script>

<style scoped>

</style>
