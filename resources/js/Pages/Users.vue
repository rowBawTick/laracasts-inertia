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

<script>
import Layout from "@/js/Layouts/Layout.vue";

export default {
    name: "Users",
    props: {
        users: Array,
        time: String,
    },
    components: { Layout },
}
</script>

<style scoped>

</style>
