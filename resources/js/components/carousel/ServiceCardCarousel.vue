<template>
    <Splide :options="options" :tag="section" aria-labelledby="My Favorite Images" v-if="services">
        <SplideSlide v-for="service in services" :key="service.id"  class="mb-3">
            <div class="card rounded-4">
                <div class="icon">
                    <img :src='`${service.image}`' :alt="service.name" class="img-fluid" width="90">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center"> {{ service.name }} </h5>
                    <p class="card-text"> {{ service.description }} </p>
                </div>
                <div class="footer py-2 text-center">
                    <router-link :to="{ name: 'services' }" class="btn" @click="selectedService( service.id )">
                        المزيد
                        <i class="fa-solid fa-plus"></i>
                    </router-link>
                </div>
            </div>
        </SplideSlide>

    </Splide>
</template>

<style scoped>
    .services .card {
        border: none;
        transition: .3s;
        overflow: hidden;
    }
    .services .card .icon {
        width: 100%;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgb(205, 226, 228);
    }
    .services .card .card-body {
        padding: 1rem;
        height: 170px;
    }
    .services .card .card-text{
        text-align: center;
        font-size: 14px;
    }
    .services .card:hover {
        box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
    }
    .services .card .btn{
        border: none;
        padding: .5rem 1rem;
        border-radius: 5px;
        transition: .3s;
        background: #7faec0;
        color: #fff;
        border: #7faec0 1px solid;
    }
    .services .card .btn:hover{
        background: transparent;
        border: #7faec0 1px solid;
        color: #000;
    }
    .splide__slide {
        padding: 1.6rem 0.5rem;
        height: 100% !important;
    }
    .splide__arrows .splide__arrow--prev {
        background: red !important;
    }
    .splide__pagination li button.is-active{
        background: #16db30 !important;
    }

</style>

<script>
    import { Splide, SplideSlide } from "@splidejs/vue-splide";
    import { defineComponent } from "vue";
    import { useStore } from "../../stores/servicesStore";

    export default defineComponent({
        components: {
            Splide,
            SplideSlide,
        },
        data() {
            return {
                services: [],
            };
        },
        setup() {
            const servicesStore = useStore();
            const options = {
                direction: "rtl",
                start: 0,
                type: "slide",
                perPage: 4,
                heightRatio : 0.4,
                gap: '1rem',
                arrows: false,
                breakpoints: {
                    992: {
                        perPage: 2,
                    },
                    768: {
                        perPage: 1,
                    },
                },
            };
            return {
                options,
                servicesStore
            };
        },
        methods: {
            selectedService(id) {
                this.servicesStore.selectedService = id;
            },
        },
        created() {
            axios.get('/api/services').then(res => {
                if(res.data.status){
                    res.data.services.forEach(service => {
                        // if screen width 1400 and 992
                        if(window.innerWidth >= 992 && window.innerWidth <= 1400){
                            if (service.description.length > 90) {
                                service.description = service.description.slice(0, 90) + '...';
                            }else{
                                service.description = service.description;
                            }
                        }else if(window.innerWidth <= 333){
                            if (service.description.length > 80) {
                                service.description = service.description.slice(0, 80) + '...';
                            }else{
                                service.description = service.description;
                            }
                        }else{
                            if (service.description.length > 150) {
                                service.description = service.description.slice(0, 150) + '...';
                            }else{
                                service.description = service.description;
                            }
                        }
                        this.services.push(service);
                    });
                }
            })
        },
    });
</script>
