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
    <div>
        Nav menu
        <nav class="bg-white flex mt-6">
            <ul class="flex gap-4 list-disc">
                <li><Link class="text-blue-500 hover:underline" href="/">Home</Link></li>
                <li><Link class="text-blue-500 hover:underline" href="/users">Users</Link></li>
                <li><Link class="text-blue-500 hover:underline" href="/settings">Settings</Link></li>
                <li><Link class="text-blue-500 hover:underline" href="/logout" method="post" as="button">Logout</Link></li>
            </ul>
        </nav>
        <br>
    </div>
</template>

