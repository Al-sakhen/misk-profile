<template>
    <div class="arrow-up">
        <i class="fa-solid fa-caret-up"></i>
    </div>
</template>

<style scoped>
    .arrow-up{
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        border-radius: 50%;
        line-height: 40px;
        text-align: center;
        background-color: rgb(48, 136, 177);
        cursor: pointer;
        z-index: 1000;
        transition: .3s;
    }
    .arrow-up:hover{
        box-shadow: 0 0 30px 7px rgba(0, 0, 0, 0.2);
    }
    .fa-caret-up{
        color: #fff;
        font-size: 20px;
    }
</style>

<script>
    export default {
        mounted() {
            $(".arrow-up").hide();
            $(window).on("scroll", () => {
                if ($(window).scrollTop() > 100) {
                    $(".arrow-up").fadeIn();
                } else {
                    $(".arrow-up").fadeOut();
                }
            });
            $(".arrow-up").on("click", () => {
                $("html, body").animate({ scrollTop: 0 }, 50);
            });
        },
    };
</script>
