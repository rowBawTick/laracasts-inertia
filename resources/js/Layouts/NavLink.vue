<template>
    <Link
        class="link"
        :class="{ 'link--active': active }"
    >
    <!-- slot is just a string, e.g. Home, which we could've passed in as a prop -->
    <slot />
    </Link>
</template>

<script>
export default {
    name: "NavLink",
    props: {
        active: Boolean,
        // href: String,
    }
}
</script>

<style scoped>

</style>
