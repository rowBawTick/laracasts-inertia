<template>
    <div class="container container--trending-themes">
        <div class="trending-themes__table-contents flex flex_direction_col justify_space_between">
            <div class="trending-themes__theme-links">
                <div class="block_header01">Trending Themes</div>
                <div class="block_header02 trending-themes__theme-links--sub-header">Last Updated:</div>
                <div class="trending-themes__theme-links--update-date flex center_items">
                    <i class="trending-themes__theme-links--date-icon fa-solid fa-calendar-check"></i>
                    <div>{{ updatedAt }}</div>
                </div>

                <div class="trending-themes__theme-links--wrapper">
                    <theme-link v-for="theme in themes" :key="theme.rank"
                                :rank="theme.rank"
                                :title="theme.theme.name"
                                :movement=theme.movement>
                    </theme-link>
                </div>
            </div>

            <div class="trending-themes__call-to-action flex center_items" >
                <div class="trending-themes__call-to-action--text">
                    <span class="trending-themes__call-to-action--text-header">
                        Not the themes that you were looking for? </span>
                    <span class="trending-themes__call-to-action--text-subtext">
                        Send us an email with the themes you are interested in. </span>
                </div>
                <div class="flex">
                    <div class="trending-themes__call-to-action--image-wrapper">
                        <img src="@/images/icons/search-icon.svg" alt="robot search icon" class="trending-themes__call-to-action--image">
                    </div>
                    <div><a href="mailto:editor@substantiveresearch.com
                         ?subject=Research enquiry for new theme
                         &body=I am interested in getting research which is in these themes:"
                            class="button_medium b_primary trending-themes__call-to-action--button">Email Us</a></div>
                </div>
            </div>
        </div>

        <div class="trending-themes__list">
            <theme v-for="theme in themes" :key="theme.rank"
                   :rank="theme.rank"
                   :title="theme.theme.name"
                   :movement=theme.movement
                   :articles="theme.research_documents">
            </theme>
        </div>
    </div>
</template>

<script>
import Theme from "./sub-components/theme";
import ThemeLink from "./sub-components/theme-link";
export default {
    name: "TrendingThemes",
    components: {ThemeLink, Theme,},
    data(){
        return{
            themes: [],
            updatedAt: '',
        }
    },
    created() {
        this.getTrendingThemes();
    },
    methods: {
        getTrendingThemes() {
            axios.get(`${this.$apiBaseUrl()}/trending-themes`)
                .then((response) => {
                    this.themes = response.data.trendingThemes;
                    this.filterResearchDocuments();
                    this.updatedAt = response.data.updatedAt;
                    this.getThemeRankMovements();
                }).catch((error) => {
                console.error(error.message);
            });
        },
        filterResearchDocuments() {
            //display only the first 4 documents for every theme
            return this.themes.filter(theme => {
                return theme.research_documents.splice(4);
            })
        },
        getThemeRankMovements() {
            axios.get(`${this.$apiBaseUrl()}/trending-themes/movements`)
                .then((response) => {
                    let movements = response.data.movements;
                    this.themes = this.themes.map(theme => {
                        let themeId = theme.theme_id;
                        return {...theme, movement: movements[themeId].movement}
                    });
                }).catch((error) => {
                console.error(error.message);
            });
        }
    }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/substantive/pages/research-discovery/sub-components/trending-themes.scss';
</style>
