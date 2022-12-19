<template>
    <div class="theme-colour" v-show="articles">
        <div class="theme-header flex justify_space_between center_items" @click="swapVisibilityArticles()" :id="rank">
            <div class="theme-header__rank">0{{rank}}</div>

            <div class="theme-header__title">{{title}}</div>

            <div class="theme-header__trend">
                <div v-if="movement === 0" class="theme-trend theme-trend--header">
                    <span>{{signedMovement}}</span>
                    <i class="fa-solid fa-arrow-right-long"></i>
                </div>
                <div v-else-if="movement < 0" class="theme-trend theme-trend--header theme-trend--down">
                    <span>{{signedMovement}}</span>
                    <i  class="fa-solid fa-arrow-trend-down"></i>
                </div>
                <div v-else class="theme-trend theme-trend--header theme-trend--up">
                    <span>{{signedMovement}}</span>
                    <i  class="fa-solid fa-arrow-trend-up"></i>
                </div>
            </div>

            <i class="material-icons theme-header__arrow" v-if="articleShow">keyboard_arrow_up</i>
            <i class="material-icons theme-header__arrow" v-else>keyboard_arrow_down</i>
        </div>

        <div class="theme-article-wrapper" v-show="articleShow" >
            <article-for-theme v-for="(themeArticle, index) in articles"
                               :key="index"
                               :themeArticle="themeArticle">
            </article-for-theme>
        </div>
    </div>
</template>

<script>
import ArticleForTheme from "./theme-article";
export default {
    name: "Theme",
    components: { ArticleForTheme},
    props:{
        rank :Number,
        title: String,
        movement: Number,
        articles: Array,
    },
    data(){
        return{
            articleShow : true,
            windowWidth: 0 ,
        }
    },
    computed:{
        signedMovement(){
            if(this.movement > 0) return "+" + this.movement;
            else return this.movement;
        }
    },
    created() {
        window.addEventListener('resize', this.handleResize);
        this.handleResize();
    },
    watch:{
        windowWidth(newWidth){
            if (newWidth < 850){
                this.articleShow = false;
            }else this.articleShow = true;
        }
    },
    methods:{
        swapVisibilityArticles(){
            this.articleShow = !this.articleShow;

            //Google Analytics for Trending Theme name
        },
        handleResize() {
            this.windowWidth = window.innerWidth;
        },
    }
}
</script>

<style lang="scss" scoped>
@import 'resources/sass/substantive/pages/research-discovery/sub-components/theme.scss';
</style>

<style scoped>

</style>
