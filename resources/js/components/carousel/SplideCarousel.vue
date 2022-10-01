<template>
    <Splide :options="newsOptions" :tag="section" aria-labelledby="My Favorite Images" dir="ltr">
        <SplideSlide v-for="news in allNews" :key="news.id">
            <div class="text-cener slider-image text-center d-flex align-items-center justify-content-center" :style="{ backgroundImage : 'url('+ 'storage/' + (news.image) + ')' }">
                <h5 class="news-title text-white p-3 w-100 text-wrap">{{ news.title }}</h5>
            </div>
        </SplideSlide>
    </Splide>
</template>

<style scoped>
    .slider-image {
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        filter: blur(0.5px);
    }
    .news-title{
        background: rgba(110, 103, 103, 0.541);
        line-height: 1.5;
    }
</style>

<script>
    import { Splide, SplideSlide } from "@splidejs/vue-splide";
import axios from "axios";
    import { defineComponent } from "vue";

    export default defineComponent({
        components: {
            Splide,
            SplideSlide,
        },
        data(){
            return {
                allNews: [],
            }
        },
        setup() {
            const newsOptions = {
                direction: "rtl",
                type: "loop",
                heightRatio : 0.3,
                autoplay: true,
                interval: 3500,
                focus: "center",
                arrows: false,
                drag: false,
                breakpoints: {
                    992: {
                        heightRatio : 0.4,
                    },
                    768: {
                        heightRatio : 0.5,
                    },
                },
            };
            return { newsOptions };
        },

        created() {
            axios.get("/api/news").then((response) => {
                this.allNews = response.data.news;
            });
        },
    });
</script>
