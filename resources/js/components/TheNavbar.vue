<template>
    <section class="position-relative">
        <section>
            <div class="container d-none d-md-block">
                <div class="row top-nav">
                    <div class="col top-nav-item">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fa-solid fa-location-dot icon fs-6"></i>
                            <p>دوار الواحة, عمان, الأردن</p>
                        </div>
                    </div>
                    <div class="col top-nav-item">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fa-solid fa-phone icon fs-6"></i>
                            <div>
                                <p>+962-*********</p>
                                <p>info@misk.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col top-nav-item">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <i class="fa-regular fa-clock icon fs-6"></i>
                            <div>
                                <p>8AM - 5PM</p>
                                <p class="text-black-50">الجمعة مغلق</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <nav class="navbar navbar-expand-lg position-sticky">
            <div class="container">
                <img src="/images/logo.png" alt="" class="navbar-brand img-fluid" style="width: 120px" />
                <button class="navbar-toggler" type="button" aria-expanded="false" aria-label="Toggle navigation"
                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions"
                    aria-controls="offcanvasWithBothOptions">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="d-none d-lg-block collapse navbar-collapse justify-content-center"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 ms-3 ms-lg-0 mb-lg-0">
                        <li class="nav-item mb-2 mb-lg-0">
                            <router-link class="nav-link" :to="{ name: 'home' }">الرئيسية</router-link>
                        </li>
                        <li class="nav-item mb-2 mb-lg-0">
                            <router-link class="nav-link" :to="{ name: 'services' }">خدماتنا</router-link>
                        </li>
                        <li class="nav-item mb-2 mb-lg-0">
                            <router-link class="nav-link" :to="{ name: 'crew' }">طاقم العمل</router-link>
                        </li>
                        <li class="nav-item mb-2 mb-lg-0">
                            <router-link class="nav-link" :to="{ name: 'contactUs' }">اتصل بنا</router-link>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="d-lg-none offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">مسك للتدقيق المالي</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>


            </div>

            <div class="offcanvas-body">
                <ul class="navbar-nav mb-2 ms-3 ms-lg-0 mb-lg-0">
                    <li class="nav-item mb-2 mb-lg-0">
                        <router-link class="nav-link" :to="{ name: 'home' }">الرئيسية</router-link>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0">
                        <router-link class="nav-link" :to="{ name: 'services' }">خدماتنا</router-link>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0">
                        <router-link class="nav-link" :to="{ name: 'crew' }">طاقم العمل</router-link>
                    </li>
                    <li class="nav-item mb-2 mb-lg-0">
                        <router-link class="nav-link" :to="{ name: 'contactUs' }">اتصل بنا</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>
<!-- box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2); -->

<style scoped>
    .navbar {
        background: rgb(255,255,255);
        background: linear-gradient(180deg, rgba(255,255,255,1) 14%, rgba(35,178,195,0.908000700280112) 87%);
    }

    .navbar-nav .active {
        color: rgb(15, 19, 19);
        padding: 7px;
        font-weight: 600;
        border-radius: 5px;
        border: 0.08rem solid;
        border-color: rgb(122, 115, 104);
    }

    /* top navbar style */
    .top-nav {
        padding: 10px 0;
        font-size: small;
    }

    .top-nav-item .icon {
        padding: 0 15px;
    }

    .top-nav-item .icon.fs-6 {
        font-size: 1.9rem !important;
    }

    .top-nav-item p {
        margin: 0;
        font-size: 14px;
    }

    .nav-link {
        position: relative;
        display: inline-block;
        font-weight: 800;
        margin-left: 25px;
    }


    .nav-link:hover {
        color: black;
        font-weight: 900;
        border-radius: 5px;
    }
</style>

<script>
    import { useStore } from '../stores/servicesStore';
export default {
    setup() {
        const servicesStore = useStore();
        return {
            servicesStore,
        };
    },
};
</script>
