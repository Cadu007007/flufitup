export default {

    state: {
        isChatPopupOpened: false,
        isNotificationsPopupOpened: false,
    },

    getters: {

        getChatPopupState(state) { //take parameter state
            return state.isChatPopupOpened
        },
        getNotificationsPopupState(state) { //take parameter state
            return state.isNotificationsPopupOpened
        }
    },

    actions: {
        changeChatPopupState(context) {
            context.commit('CHANGE_CHAT_POPUP_STATE')
        },
        changeNotificationsPopupState(context) {
            context.commit('CHANGE_NOTIFICATIONS_POPUP_STATE')
        }
    },

    mutations: {
        CHANGE_CHAT_POPUP_STATE(state) {
            state.isChatPopupOpened = !state.isChatPopupOpened
            state.isNotificationsPopupOpened = false
        },
        CHANGE_NOTIFICATIONS_POPUP_STATE(state) {
            state.isNotificationsPopupOpened = !state.isNotificationsPopupOpened
            state.isChatPopupOpened = false
        }
    }
}