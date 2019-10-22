<template>
<div>   
    <!-- Modal -->
    <div v-if="showModal"  class="modal fade" id="updateUser" tabindex="-1" role="dialog">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
            <button type="button" class="close" @click="showModal=false" data-dismiss="modal">
            <span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <input type="hidden" id="id" disabled class="form-control" :value="this.id">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Name</span>
                    </div>
                        <input type="text" class="form-control" required :value="this.name"  id="name">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Userame</span>
                    </div>
                        <input type="text" class="form-control" required :value="this.username"  id="username">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                        <input type="text" class="form-control" required :value="this.email" id="email">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Role</span>
                    </div>
                        <select class="form-control" required  id="role">
                            <option v-for="arole in roles" v-bind:key="arole.id" :value="arole.id" selected>{{arole.role}}</option>
                        </select>
                </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="userUpdate()">Update</button>
                <button type="button" class="btn btn-primary" @click="showModal=false" data-dismiss="modal">close</button>
        </div>
        </div>
    </div>
    </div>


    <div>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created at</th>
            </tr>
            <tbody>
                <tr v-for="user in users" v-bind:key="user.id">
                    <td>{{ user.id }}</td>
                    <td ><span id="show-modal" class="btn btn-default" v-on:click=" user.role == 'administrator' ? showModal=false : showModal=true;userVal(user.id, user.name, user.username, user.email, user.role)" data-toggle="modal" data-target="#updateUser">{{ user.name }}</span></td>
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
           roles: [],
           showModal: false,
           userVal( u_id, u_name, u_username, u_email, u_role ){
                this.id = u_id;
                this.name = u_name;
                this.username = u_username;
                this.email = u_email;
                this.role = u_role;
           }
       }
   },
   created: function() {
       axios.get('http://localhost:8000/api/all-users')
        .then((response) => {
            this.users = response.data;
            console.log(response.data);
        })
       axios.get('http://localhost:8000/api/all-roles/id')
       .then((response) => {
           this.roles = response.data;
            console.log(response.data);
       })
    },
    methods: {
        userUpdate(){
            let id = document.getElementById('id').value
            let name = document.getElementById('name').value
            let username = document.getElementById('username').value
            let email = document.getElementById('email').value
            let role = document.getElementById('role').value
            // console.log(id);
            axios.put('http://localhost:8000/api/update-user/'+id,{
                name: name,
                username: username,
                email: email,
                role: role,})
            .then((response) => {
                console.log(response.data.message);
            })
            

        }
    }
}
    // $('#role').modal(options)
</script>
<style scoped>
    #show-modal{
        border: none;
        padding: 0 auto; 
    }
</style>

