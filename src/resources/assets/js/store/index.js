import Vue from 'vue';
import Vuex from 'vuex';
import api from '../api/auth';

Vue.use(Vuex);

export default new Vuex.Store({
	state: {
		user: {

		}
	},
	mutations: {
		USER_FETCHED(state, payload) {
			state.user = payload;
		}
	},
	actions: {
		auth({ commit }) {
			api.user().then(response => {
				if (!response.error) {
					commit('USER_FETCHED', response);
				}
			});
		}
	}
})