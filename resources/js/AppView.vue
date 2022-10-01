<template>
    <section>
        <TheNavbar />
        <div class="pb-5" style="min-height: 77vh">
            <router-view v-slot="{ Component }">
                <transition name="slide" mode="out-in">
                    <component :is="Component"></component>
                </transition>
            </router-view>
        </div>
        <TheFooter />
        <TheArrowUpButton />
    </section>
</template>

<style scoped>
    .slide-enter-active,
    .slide-leave-active {
        transition: opacity 0.4s, transform 0.4s;
    }

    .slide-enter-from,
    .slide-leave-to {
        opacity: 0;
        transform: translateX(10%);
    }
</style>

<script>
    import TheFooter from './components/TheFooter.vue';
    import TheNavbar from "./components/TheNavbar.vue";
    import TheArrowUpButton from './components/TheArrowUpButton.vue';

    export default {
        components: {
            TheNavbar,
            TheFooter,
            TheArrowUpButton,
        },
    };
</script>
