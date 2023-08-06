// src/store/index.js
import { createStore } from 'vuex';

const store = createStore({
  state: {
    token: null,
    user: null,
    permission: null,
    isLoggedIn: false
  },
  mutations: {
    setToken(state, token) {
      state.token = token;
    },
    setUser(state, user) {
      state.user = user;
    },
    setPermissions(state, permission) {
      state.permission = permission;
    },
    login(state) {
      state.isLoggedIn = true;
    },
    logout(state) {
      state.isLoggedIn = false;
    },
  },
  actions: {
    updateToken({ commit }, token) {
      commit('setToken', token);
    },
    updateUser({ commit }, user) {
      commit('setUser', user);
    },
    updatePermission({ commit }, permission) {
      commit('setPermission', permission);
    },

  },
  getters: {
    getToken: state => state.token,
    getUser: state => state.user,
    getPermission: state => state.permission,
    getIsLoggedIn: state => state.isLoggedIn,
  },
});

export default store;
