<template>
    The users are:
    <div v-for="user in users" :key="user.id">
        {{ user.name }}
    </div>
    <!-- To allow for scrolling and then preserve the scroll position-->
    <div style="margin-top: 1200px">
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
// KU Share: executed in setup() scope (for each instance)

// KU Share: Can use <script setup> (syntactic sugar for manually exporting an object that declares a setup method)
// Then you don't need to define components (composition API)
defineProps({
    users: Array,
    time: String,
});
</script>

<style scoped>

</style>
