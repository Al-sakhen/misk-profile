<template>
    <section class="container py-5">
        <h1 class="text-center mb-5">تواصل معنا</h1>
        <div class="row">
            <div class="col-md-6 order-2 order-md-1 conatact-us">
                <div class="row justify-content-center">

                    <div class="col-md-5 mb-3">
                        <div class="contact-card">
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-holder d-flex justify-content-center">
                                    <i class="fa-solid fa-phone icon fs-2"></i>
                                </div>
                                <h3 class="mb-3 text-center">الهاتف</h3>
                                <a href="tel:+" class="text-decoration-none">+962-*********</a>
                                <a href="tel:+" class="text-decoration-none">+962-*********</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <div class="contact-card">
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-holder d-flex justify-content-center">
                                    <i class="fa-solid fa-envelope icon fs-2"></i>
                                </div>
                                <h3 class="mb-3 text-center">بريدنا الإلكتروني</h3>
                                <a href="mailto:info@misk.com" class="text-decoration-none">info@misk.com</a>
                                <a href="mailto:info@misk.com" class="text-decoration-none">info@misk.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <div class="contact-card">
                            <div class="d-flex flex-column align-items-center">
                                <div class="icon-holder d-flex justify-content-center">
                                    <i class="fas icon fa-map-marker-alt fs-2"></i>
                                </div>
                                <h3 class="mb-3 text-center">العنوان</h3>
                                <p>شارع المدينة المنورة, مجمع البركة, مكتب رقم 307</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-4 mb-md-0  order-1 order-md-2">
                <form action="">
                    <div class="form-floating mb-3">
                        <input type="name" class="form-control" id="name" placeholder="الإسم">
                        <label for="name">الإسم</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input type="email" class="form-control" id="email" placeholder="البريد الإلكتروني">
                        <label for="email">البريد الالكتروني</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="phone" placeholder="رقم الهاتف">
                        <label for="phone">رقم الهاتف</label>
                    </div>
                    <div class="form-floating mb-2">
                        <textarea class="form-control" id="message" placeholder="الرسالة"></textarea>
                        <label for="message">الرسالة</label>
                    </div>
                    <button type="submit" class="btn btn-info">ارسال</button>
                </form>
            </div>
        </div>
    </section>
</template>

<style scoped>
.contact-card{
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,.1);
    padding: 15px ;
    transition: all .3s ease-in-out;
}
.contact-card .icon-holder{
    width: 100%;
    padding: 15px;
}
.contact-card p {
    font-size: 14px;
    line-height: 1.5;
    text-align: center3
}


.contact-card:hover{
    box-shadow: 0 0 10px rgba(0,0,0,.2);
    transform: translateY(-5px);
    background: var(--main-color);
    color: #fff;
}
.contact-card:hover a{
    color: #fff;


}
</style>

<!-- background-color: #95b9ce50; -->

