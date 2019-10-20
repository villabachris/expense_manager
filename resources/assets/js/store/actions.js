let actions = {
    createPost({commit}, user) {
        axios.post('/api/users', user)
            .then(res => {
                commit('CREATE_USER', res.data)
            }).catch(err => {
            console.log(err)
        })

    },
    fetchPosts({commit}) {
        axios.get('/api/users')
            .then(res => {
                commit('FETCH_USERS', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deletePost({commit}, user) {
        axios.delete(`/api/users/${user.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_USER', user)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions