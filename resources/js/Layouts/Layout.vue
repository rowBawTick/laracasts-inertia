<template>
    <Head title="KU Share">
        <!-- head-key ensures there is only one description per page if a child page has one too -->
        <meta
            type="description"
            content="Sharing Knowledge in the KU Share"
            head-key="description"
        >
    </Head>
    <div>
        <section class="p-6 bg-gray-200">
            <header class="flex items-center justify-between">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold">
                        <!-- If you change the input here then it will be destroyed
                            (current implementation in our new repo -->
                        <input type="text" value="My App">
                    </h1>
                    <p class="ml-8">Welcome back, {{ username }}!</p>
                </div>
                <Navbar></Navbar>
            </header>
        </section>

        <section class="p-6">
            <div class="max-w-3xl mx-auto">
                <!-- TODO: chris 15/02/2023 - Keep the podcast playing as browsing site  -->
                <iframe class="mb-6" height="200px" width="100%" frameborder="no" scrolling="no" seamless
                        src="https://player.simplecast.com/b83b0a3a-c934-480e-af5d-3007fccd57b6?dark=false">
                </iframe>
                <slot></slot>
            </div>
        </section>
    </div>
</template>

<script>
import Navbar from "@/js/Layouts/Navbar.vue";
export default {
    name: "Layout",
    components: { Navbar },
    computed: {
        username() {
            return this.$page.props.auth.user.name;
        }
    }
}
</script>

<style scoped>

</style>
