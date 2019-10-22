<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="addUser" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="addUser()">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Name</span>
                        </div>
                            <input type="text" class="form-control" v-model="name">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Username</span>
                        </div>
                            <input type="text" class="form-control" v-model="username">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                            <input type="password" class="form-control" v-model="password">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                     
                            <input type="text" class="form-control" v-model="email">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Role</span>
                        </div>
                            <select name="role" id="role" class="form-control" v-model="role">
                                <option value="" selected disabled > Select Role ...</option>
                                <option v-for="urole in u_roles" v-bind:key="urole.id" :value="urole.id">{{urole.role}}</option>
                            </select>                     
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            </div>
        </div>
        </div>
        <div class="col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#addUser">
            Add Roles
            </button>
        </div>
    </div>
</template>
<script>

import { required, email, minLength } from "vuelidate/lib/validators"; 

export default {
    mounted() {
        console.log('Component mounted.')
    },
    data() {
        return {
            u_roles: [],
            name: '',
            username: '',
            email: '',
            password: '',
            role: '',
        }
    },
    created: function(){
        axios.get('http://localhost:8000/api/all-roles/id')
        .then((response) => {
            this.u_roles = response.data;
            console.log(response.data);
        })
    },
    validations: {
        name: {required},
        username: {required},
        email: {required, email },
        password : { required, minLength: minLength(6) },
        role: {required},
    },
    methods: {
        addUser(){
            // alert('dasdasd')
            axios.post('http://localhost:8000/api/add-user/new',{
                name: this.name,
                username: this.username,
                email: this.email,
                password: this.password,
                role: this.role,
            })
            .then((response)=>{
                alert(response.data.message);
                document.location.reload();
                // alert(JSON.stringify(response.data));
                // location.href="/all/users";
            })
            // .catch((err) => {
            //     // console.log(err)
            // })
        }
    }
}
</script>