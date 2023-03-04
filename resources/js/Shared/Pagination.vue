<template>
    <!-- Page controls -->
    <div>
        <!-- Short way - Vue dynamic component (using "is" option) -->
        <Component v-for="link in links"
                   class="px-1"
                   :class="[{'text-gray-500': !link.url}, getLinkClass(link)]"
                   :is="link.url ? 'Link' : 'span'"
                   :href="link.url"
                   v-html="link.label"
        />
        <!-- Long Way -->
        <!--        <template v-for="link in paginatedUsers.links">-->
        <!--            <Link v-if="link.url" -->
        <!--                  :href="link.url" -->
        <!--                  v-html="link.label" />-->
        <!--            <span v-else v-html="link.label"></span>-->
        <!--        </template>-->
    </div>
</template>

<script>
export default {
    name: "Pagination",
    props: {
        links: Array,
    },
    methods: {
        getLinkClass(link) {
            return link.active ? 'font-bold text-blue-500' : '';
        }
    }
}
</script>

<style scoped>

</style>
