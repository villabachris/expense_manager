<template>
<div>   
    <!-- Modal -->
    <!-- <div v-if="showModal"  class="modal fade" id="updateUser" tabindex="-1" role="dialog">
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
    </div> -->


    <div>
        <table class="table table-striped">
            <tr>
                <th>Expenses Category</th>
                <th>Total</th>
            </tr>
            <tbody>
                <tr v-for="exp in expenses" v-bind:key="exp.id">
                    <td>{{ exp.category }}</td>
                    <td>{{ exp.total | currency }}</td>
                </tr>
                <tr>
                    <td><h5 class="text-right"> Total: </h5></td>
                    <td>{{ sum | currency }}</td>
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
       expenses: [],
       sum: '',
    }
},
created: function() {
    axios.get('http://localhost:8000/api/expenses/summary')
    .then((response) => {
        this.expenses = response.data.total;
        this.sum = JSON.stringify(response.data.sum);
        console.log(response.data.total);
        console.log(response.data.sum);
    })
},
methods: {
            
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

