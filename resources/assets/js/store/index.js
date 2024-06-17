import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        reviews: []
    },
    getters: {
        Reviews(state) {
            return state.reviews;
        },
    },
    mutations: {
        storeReview(state, review) {
            state.reviews.push(review);
        },
        setReviews(state, reviews) {
            state.reviews = reviews;
        }
    },
    actions: {},
    modules: {},
});
