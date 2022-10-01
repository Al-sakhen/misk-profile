<template>
    <section class="container py-5">
        <h1 class="text-center">خدماتنا المهنية</h1>
        <h3>إليكم نبذة مختصرة عن خدماتنا ......</h3>

        <div class="accordion accordion-flush overflow-hidden pt-3" id="accordionFlushExample">

            <div class="accordion-item" v-for="( service , index) in services" :key="service.id" >
                <h2 class="accordion-header" :id="`flush-heading${service.id}`">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" :id="`btn-${service.id}`"
                        :data-bs-target="`#flush-collapse${service.id}`" aria-expanded="false" :aria-controls="`flush-collapse${service.id}`">
                        <h5>{{ index + 1 }}-	{{ service.name }} : </h5>
                    </button>
                </h2>
                <div :id="`flush-collapse${service.id}`" class="accordion-collapse collapse" :aria-labelledby="`flush-heading${service.id}`"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p v-if="service.description"> {{ service.description }} </p>
                        <p v-if="service.description2"> {{ service.description2 }} </p>
                        <div v-if="service.details">
                            <ul v-for="detail in service.details" :key="detail.id">
                                <li> {{detail.name}} </li>
                            </ul>
                        </div>
                        <p v-if="service.description3"> {{ service.description3 }} </p>
                    </div>
                </div>
            </div>

        </div>
    </section>
</template>
<style scoped>
    .accordion-button:focus {
        outline: 0;
        box-shadow: none;
    }
    .accordion-button:not(.collapsed) {
        color: #2b4b79;
    }
</style>

<script>
import { useStore } from '../stores/servicesStore';

    export default {
        setup() {
            const servicesStore = useStore();
            return {
                servicesStore,
            }
        },
        data() {
            return {
                services: [],
            }
        },
        created(){
            axios.get('/api/services').then(res => {
                if(res.data.status){
                    this.services = res.data.services;
                }
            })
            .then(() => {
                let selected_service_id = this.servicesStore.selectedService

                $(`#btn-${selected_service_id}`).removeClass('collapsed');
                $(`#flush-collapse${selected_service_id}`).addClass('show');

            })
            .then(() => {
                this.servicesStore.selectedService = null;
            })
        },
    };
</script>
