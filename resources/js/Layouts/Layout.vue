<template>
    <section class="p-6 bg-gray-200">
        <header class="flex items-center justify-between">
            <div class="flex items-center">
                <h1 class="text-xl font-bold">My App</h1>
                <p class="ml-8">Welcome back, {{ username }}!</p>
            </div>
            <Navbar></Navbar>
        </header>
    </section>

    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot></slot>
        </div>
    </section>
</template>

<script>
import Navbar from "@/js/Layouts/Navbar.vue";
export default {
    name: "Layout",
    components: { Navbar },
    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
}
</script>

<style scoped>

</style>
