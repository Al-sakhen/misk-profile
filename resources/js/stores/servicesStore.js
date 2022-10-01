import {defineStore} from "pinia";

export const useStore = defineStore("useStore", {
    state: () => {
        return {
            selectedService: null,
        };
    },
});
