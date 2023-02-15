<template>
    <Layout>
        The users are:
        <div v-for="user in users">
            {{ user }}
        </div>
        <!-- To allow for scrolling and then preserve the scroll position-->
        <div style="margin-top: 1200px">
            <p>The current time is {{ time }}</p>
            <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>
        </div>
    </Layout>
</template>

<script setup>
import Layout from "@/js/Layouts/Layout.vue";

// Can use <script setup> (syntactic sugar for manually exporting an object that declares a setup method)
// Then you don't need to define components
defineProps({
    users: Array,
    time: String,
});
</script>

<style scoped>

</style>
