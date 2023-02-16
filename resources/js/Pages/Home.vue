<script>

// Need to use with <script setup>
// This is equivalent to export default plus registering components (see below)
// defineProps({
//     canLogin: Boolean,
//     canRegister: Boolean,
//     laravelVersion: String,
//     phpVersion: String,
// });

export default {
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },
}
</script>

<template>
    <Head>
        <title>Home</title>
        <meta
            type="description"
            content="Home page in the KU Share"
            head-key="description"
        >
    </Head>
    <h1 class="text-3xl font-bold">Home</h1>
</template>
