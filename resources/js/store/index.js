import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {},
    state: {
        error: '',
        searchResult: [],
        noResultMessage: '',
        loading: false,
        options: {
            'priceMin': 0,
            'priceMax': 0,
            'bedrooms': 5,
            'bathrooms': 5,
            'storeys': 5,
            'garages': 5,
        },
    },
    getters: {
    },
    actions: {
        search({ commit }, formData) {
            commit('SET_LOADING_STATE', true);
            let urlParams = '?';

            for (let key in formData) {
                urlParams += key + '=' + formData[key] + '&';
            }

            axios.get('/api/search/' + urlParams)
                .then((response) => {
                    if (response.data.success === true) {
                        commit('SET_SEARCH_RESULT', response.data.data);
                        if (response.data.data.length === 0) {
                            commit('SET_NO_RESULT_MESSAGE');
                        }
                    }
                    else {
                        commit('SET_ERROR', response.data.message);
                    }
                    commit('SET_LOADING_STATE', false);
                })
                .catch((e) => {
                    commit('SET_ERROR', e);
                    commit('SET_LOADING_STATE', false);
                })

        },
        fetchOptions({ commit }) {
            axios.get('/api/property/options')
                .then((response) => {
                    if (response.data.success === true && response.data.data.length !== 0) {
                        commit('SET_OPTIONS', response.data.data);
                    }
                })
                .catch((e) => {
                    commit('SET_ERROR', e);
                });
        },
        clearError({ commit }) {
            commit('SET_ERROR', '');
        },
    },
    mutations: {
        SET_ERROR(state, data) {
            state.error = data;
        },
        SET_SEARCH_RESULT(state, data) {
            state.searchResult = data.map((item) => {
                item.price = (+item.price).toLocaleString();
                return item;

            });
        },
        SET_NO_RESULT_MESSAGE(state) {
            state.noResultMessage = 'No results were found';
        },
        SET_OPTIONS(state, data) {
            data.priceMin = Math.floor(data.priceMin / 1000) * 1000;
            data.priceMax = Math.ceil(data.priceMax / 1000) * 1000;
            state.options = {...data};
        },
        SET_LOADING_STATE(state, data) {
            state.loading = data;
        }
    },
});
