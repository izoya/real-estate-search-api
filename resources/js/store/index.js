import Vue from 'vue';
import Vuex from 'vuex';


Vue.use(Vuex);

export default new Vuex.Store({
    modules: {},
    state: {
        error: '',
        searchResult: [],
        noResultMessage: '',
    },
    getters: {
    },
    actions: {
        search({ commit }, formData) {
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
                })
                .catch((e) => {
                    commit('SET_ERROR', e);
                })

        },
        clearError: ({ commit }) => {
            commit('SET_ERROR', '');
        },
    },
    mutations: {
        SET_ERROR(state, data) {
            state.error = data;
        },
        SET_SEARCH_RESULT(state, data) {
            state.searchResult = [...data];
        },
        SET_NO_RESULT_MESSAGE(state) {
            state.noResultMessage = 'No results were found';
        },
    },
});
