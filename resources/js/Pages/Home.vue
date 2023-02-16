<script>
import { Head, Link } from '@inertiajs/inertia-vue3';

// Need to use with <script setup>
// This is equivalent to export default plus registering components (see below)
// defineProps({
//     canLogin: Boolean,
//     canRegister: Boolean,
//     laravelVersion: String,
//     phpVersion: String,
// });

export default {
    components: { Link, Head },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>

<template>
    <h1 class="text-3xl font-bold">Home</h1>
</template>
