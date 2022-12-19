<template>
    <Layout>
        The users are:
        <div v-for="user in users">
            {{ user }}
        </div>
    </Layout>
</template>

<script>
import Layout from "@/js/Layouts/Layout.vue";

export default {
    name: "Users",
    props: {
        users: Array,
    },
    components: { Layout },
}
</script>

<style scoped>

</style>
