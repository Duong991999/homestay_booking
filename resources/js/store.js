import { isLoggedIn, logIn, logOut } from './shared/utils/auth';

export default {
    state: {
        lastSearch: {
            from: null,
            to: null,
        },
        basket: {
            items: [],
        },
        isLoggedIn: false,
        user: {},
		token: null
    },
    mutations: {
        setLastSearch(state, payload) {
            state.lastSearch = payload;
        },
        addToBasket(state, payload) {
            state.basket.items.push(payload);
        },
        removeFromBasket(state, payload) {
            state.basket.items = state.basket.items.filter((item) => item.bookable.id !== payload);
        },
        setBasket(state, payload) {
            state.basket = payload;
        },
        setUser(state, payload) {
            state.user = payload;
			localStorage.setItem('user', payload); 

        },
        setLoggedIn(state, payload) {
            state.isLoggedIn = payload;
			localStorage.setItem('isLoggedIn', payload); 
        },

		setToken(state, token) {
			state.token = token;
			localStorage.setItem('token', token); 
		}

    },
    actions: {
        setLastSearch(context, payload) {
            context.commit('setLastSearch', payload);
            localStorage.setItem('lastSearch', JSON.stringify(payload));
        },
        loadStoredState(context) {
            const lastSearch = localStorage.getItem('lastSearch');
            if (lastSearch) {
                context.commit('setLastSearch', JSON.parse(lastSearch));
            }

            const basket = localStorage.getItem('basket');
            if (basket) {
                context.commit('setBasket', JSON.parse(basket));
            }
			
            context.commit('setLoggedIn', isLoggedIn());
        },
        addToBasket({ commit, state }, payload) {
            // context.state, context.commit
            commit('addToBasket', payload);
            localStorage.setItem('basket', JSON.stringify(state.basket));
        },
        removeFromBasket({ commit, state }, payload) {
            commit('removeFromBasket', payload);
            localStorage.setItem('basket', JSON.stringify(state.basket));
        },
        clearBasket({ commit, state }, payload) {
            commit('setBasket', { items: [] });
            localStorage.setItem('basket', JSON.stringify(state.basket));
        },
        async loadUser({ commit, dispatch, state }) {
            if (isLoggedIn()) {
                try {
                    const user = (await axios.get('/api/user')).data;
                    commit('setUser', user);
                    commit('setLoggedIn', true);
                } catch (error) {
                    dispatch('logout');
                }
            }
        },
        logout({ commit }) {
            commit('setUser', {});
            commit('setLoggedIn', false);
            logOut();
        },

		login({ commit }, data) {
			commit('setUser', data.user);
			commit('setLoggedIn', true);
			commit('setToken', data.token);
			logIn();
		},
    },
    getters: {
        itemsInBasket: (state) => state.basket.items.length,
        inBasketAlready(state) {
            return function (id) {
                return state.basket.items.reduce(
                    (result, item) => result || item.bookable.id === id,
                    false
                );
            };
        },

		getToken(state) {
			return state.token;
		},
		getUser(state) {
			return state.user;
		},
    },
};
