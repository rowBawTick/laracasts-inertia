<script>
import { Link } from '@inertiajs/inertia-vue3'
import NavLink from "@/js/Layouts/NavLink.vue";

export default {
    name: "Navbar",
    components: { Link, NavLink },
}
</script>

<style scoped>

</style>
<template>
    <div class="flex items-center">
        <nav>
            <ul class="flex space-x-4 list-inside">
                <li>
                    <NavLink href="/" :active="$page.url === '/'">Home</NavLink>
                </li>
                <li>
                    <!-- If using query strings then can check the start -->
<!--                    <NavLink href="/users?search=chris" :active="$page.url.startsWith('/users')">Users</NavLink>-->
                    <NavLink href="/users" :active="$page.url.startsWith('/users')">Users</NavLink>
                </li>
                <li>
                    <!-- Can also match against the page component -->
                    <NavLink href="/settings?foo=bar" :active="$page.component === 'Settings'">Settings</NavLink>
                </li>
                <!-- KU Share: Instead of creating a form and listening for it to be submitted -->
                <!-- Can just have a button and handle it in web.php.
                    Inertia makes an axios request and sorts cookies for you too -->
                <li>
                    <Link class="link"
                          href="/logout"
                          method="post"
                          as="button"
                          :data="{ foo: 'bar' }"
                    >Logout
                    </Link>
                </li>
            </ul>
        </nav>
        <br>
    </div>
</template>

