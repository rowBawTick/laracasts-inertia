<template>
    <div>
        Hello Themes {{ name }}
        <div v-for="theme in themes">
            {{theme}}
        </div>
        <div>
            Themes from database
            <ul>
                <li v-for="theme in databaseThemes">* {{theme.name}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "Themes",
    props: {
        name: String,
        themes: Array,
    },
    data() {
        return {
            databaseThemes: [],
        }
    },
    created() {
        this.getThemes();
    },
    methods: {
        getThemes() {
            console.log('getting themes');
            axios.get('/api/get-themes')
                .then((response) => {
                    console.log(response.data)
                    this.databaseThemes = response.data;
                });
        }
    }
}
</script>

<style scoped>

</style>
