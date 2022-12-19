<script>
import { Link } from '@inertiajs/inertia-vue3'
export default {
    name: "Navbar",
    components: { Link },
}
</script>

<style scoped>

</style>
<template>
    <div class="flex items-center">
        <nav>
            <ul class="flex list-disc space-x-4 list-inside">
                <li><Link class="text-blue-500 hover:underline" href="/">Home</Link></li>
                <li><Link class="text-blue-500 hover:underline" href="/users">Users</Link></li>
                <li><Link class="text-blue-500 hover:underline" href="/settings">Settings</Link></li>
                <li><Link class="text-blue-500 hover:underline" href="/logout" method="post" as="button">Logout</Link></li>
            </ul>
        </nav>
        <br>
    </div>
</template>

