<template>
<div>   
    <div>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created at</th>
            </tr>
            <tbody>
                <tr v-for="user in users" v-bind:key="user.id">
                    <td>{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td>{{ user.role }}</td>
                    <td>{{ user.created_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>

export default {
    mounted() {
        console.log('Component mounted.')
   },
   data() {
       return {
           users: [],
       }
   },
   created: function() {
       axios.get('http://localhost:8000/api/all-users')
        .then((response) => {
        this.users = response.data;
        console.log(response.data);
        })
    },
    methods: {
    }
}
    // $('#role').modal(options)
</script>
<style scoped>
</style>

