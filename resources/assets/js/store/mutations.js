let mutations = {
    CREATE_USER(state, user) {
        state.users.unshift(user)
    },
    FETCH_POSTS(state, users) {
        return state.users = users
    },
    DELETE_POST(state, user) {
        let index = state.users.findIndex(item => item.id === user.id)
        state.users.splice(index, 1)
    }

}
export default mutations