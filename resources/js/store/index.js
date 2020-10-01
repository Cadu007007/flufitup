export default {

    state: {
        isChatPopupOpened: false,
        isNotificationsPopupOpened: false,
        isUserPopupOpened: false,
    },

    getters: {

        getChatPopupState(state) { //take parameter state
            return state.isChatPopupOpened
        },
        getNotificationsPopupState(state) { //take parameter state
            return state.isNotificationsPopupOpened
        },
        getUserPopupState(state) { //take parameter state
            return state.isUserPopupOpened
        }
    },

    actions: {
        changeChatPopupState(context) {
            context.commit('CHANGE_CHAT_POPUP_STATE')
        },
        changeNotificationsPopupState(context) {
            context.commit('CHANGE_NOTIFICATIONS_POPUP_STATE')
        },
        changeUserPopupState(context) {
            context.commit('CHANGE_USER_POPUP_STATE')
        },

    },

    mutations: {
        CHANGE_CHAT_POPUP_STATE(state) {
            state.isChatPopupOpened = !state.isChatPopupOpened
            state.isNotificationsPopupOpened = false
            state.isUserPopupOpened = false
        },
        CHANGE_NOTIFICATIONS_POPUP_STATE(state) {
            state.isNotificationsPopupOpened = !state.isNotificationsPopupOpened
            state.isChatPopupOpened = false
            state.isUserPopupOpened = false

        },
        CHANGE_USER_POPUP_STATE(state) {
            state.isUserPopupOpened = !state.isUserPopupOpened
            state.isNotificationsPopupOpened = false
            state.isChatPopupOpened = false
        }
    }
}