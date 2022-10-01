<template>
    <section class="py-5">
        <div class="container">
            <div class="row blog">
                <h1 class="text-center my-4"> طاقم العمل</h1>
                <div class="carousel-inner">
                    <div class="row" v-if="team_members && team_members.length > 0">
                        <div class="col-lg-3 col-md-6 col-sm-6 my-2" v-for="member in team_members" :key="member.id">
                            <div class="our-team">
                                <div class="pic" v-if="member.image">
                                    <img :src="`storage/`+`${member.image}`">
                                </div>
                                <div class="pic" v-else>
                                    <img src="/images/default-user2.jpg">
                                </div>
                                <div class="team-content">
                                    <h3 class="title">{{ member.name }}</h3>
                                    <span class="post">{{ member.position }}</span>
                                </div>
                                <div class="social d-flex align-items-center justify-content-center px-4">
                                    <span class="ms-2">
                                        <p>{{member.description}}</p>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" v-else>
                        <h4 class="text-center mt-5">ليس هنالك اي شخص بعد</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>
    h1 {
        margin-top: 0;
        font-size: 3rem;
        display: inline-block;
    }

    h1 div {
        position: relative;
        float: left;
    }

    h1 div:first-child {
        color: #3498db;
        margin-right: 1rem;
    }


    .our-team {
        padding: 0 0 40px;
        background: #f9f9f9;
        text-align: center;
        overflow: hidden;
        position: relative;
        border-bottom: 5px solid #00325a;
    }

    .our-team:hover {
        border-bottom: 5px solid #2f2f2f;
    }

    .our-team .pic {
        display: inline-block;
        width: 130px;
        height: 130px;
        margin-bottom: 20px;
        z-index: 1;
        position: relative;
    }

    .our-team .pic:before {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: var(--secondary-color);
        position: absolute;
        bottom: 135%;
        right: 0;
        left: 0;
        opacity: 1;
        transform: scale(3);
        transition: all 0.3s linear 0s;
    }

    .our-team:hover .pic:before {
        height: 100%;
        background: #1ddae0;
    }

    .our-team .pic:after {
        content: "";
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: #ffffff00;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 1;
        transition: all 0.3s linear 0s;
    }

    .our-team:hover .pic:after {
        background: var(--main-color);
    }

    .our-team .pic img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        transform: scale(1);
        transition: all 0.9s ease 0s;
        box-shadow: 0 0 0 14px #f7f5ec;
        transform: scale(0.7);
        position: relative;
        z-index: 2;
    }

    .our-team:hover .pic img {
        box-shadow: 0 0 0 14px #f7f5ec;
        transform: scale(0.7);
    }

    .our-team .team-content {
        margin-bottom: 30px;
    }

    .our-team .title {
        font-size: 22px;
        font-weight: 700;
        color: #4e5052;
        letter-spacing: 1px;
        text-transform: capitalize;
        margin-bottom: 5px;
    }

    .our-team .post {
        display: block;
        font-size: 15px;
        color: #4e5052;
        text-transform: capitalize;
    }
    .our-team .social {
        width: 100%;
        padding-top: 10px;
        margin: 0;
        background: var(--main-color);
        position: absolute;
        bottom: -100px;
        left: 0;
        transition: all 0.5s ease 0s;
    }

    .our-team:hover .social {
        bottom: 0;
    }
    .our-team .social {
        display: inline-block;
    }
    .our-team .social  .icon {
        display: block;
        padding-top: 4px;
        padding-bottom: 4px;
        padding: 4px;
        font-size: 25px;
        color: #fff;
        transition: all 0.3s ease 0s;
    }
    .our-team .social  .icon:hover {
        padding: 4px;
        border-radius: 50%;
        color: #145889;
        background: #f7f5ec;
        cursor: pointer;
    }
    @media only screen and (max-width: 990px) {
        .our-team {
            margin-bottom: 10px;
        }
    }
</style>

<script>

    export default {
        data() {
            return {
                team_members: null
            }
        },
        created(){
            axios.get('/api/team-members').then(response => {
                if(response.data.status ){
                    this.team_members = response.data.data;
                }
            })
        }
    }
</script>
