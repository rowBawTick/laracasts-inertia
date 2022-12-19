<template>
    <div>
        <Navbar/>
        The users are:
        <div v-for="user in users">
            {{ user }}
        </div>
    </div>
</template>

<script>
import Navbar from "@/Layouts/Navbar.vue";

export default {
    name: "Users",
    props: {
        users: Array,
    },
    components: { Navbar },
}
</script>

<style scoped>

</style>
