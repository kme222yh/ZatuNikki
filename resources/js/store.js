import { createStore } from 'vuex'


// Create a new store instance.
export default createStore({
    state () {
      return {
        displayGrayBackground: false,
        nowOpened: null,

        messageQueue: [],
      }
    },
    mutations: {
      openSomething(state, payload){
          state.displayGrayBackground = true;
          state.nowOpened = payload;
      },
      closeSomething(state){
          state.displayGrayBackground = false;
          state.nowOpened = null;
      },


      pushMessage(state, payload){
          state.messageQueue.push(payload);
      },
  },
  getters: {
      popMessage(state){return state.messageQueue.shift();},
      doesExistMessage(state){return state.messageQueue.length;},
  }

});
