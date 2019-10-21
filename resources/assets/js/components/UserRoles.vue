<template>
<div>
    <!-- Modal -->
    <div v-if="showModal"  class="modal fade" id="role" tabindex="-1" role="dialog">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Role</h5>
            <button type="button" class="close" @click="showModal=false" data-dismiss="modal">
            <span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <input type="hidden" id="r_id" disabled class="form-control" required :value="this.r_id" name="id">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Display Name</span>
                    </div>
                        <input type="text" class="form-control" required :value="this.r_role" id="r_role" name="role">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                     
                        <input type="text" class="form-control" required :value="this.r_desc" id="r_desc" name="desc">
                </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="roleUpdate()">Update</button>
                <button type="button" class="btn btn-primary" @click="showModal=false" data-dismiss="modal">close</button>
        </div>
        </div>
    </div>
    </div>
        
    <div>
        <table class="table table-striped">
            <tr>
                <th>Display Name</th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
            <tbody>
                <tr v-for="role in roles" v-bind:key="role.id">
                    <td id="show-modal" class="btn" :class=" role.role == 'administrator' ? 'disabled' : '' " v-on:click="role.role == 'administrator' ? showModal=false : showModal=true;roleVal(role.id, role.role, role.description)"   data-toggle="modal" data-target="#role">{{ role.role }}</td>
                    <td>{{ role.description }}</td>
                    <td>{{ role.created_at }}</td>
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
           roles: [],
           rolesUpdate: [],
           showModal: false,
            roleVal(val_id, val_role, val_desc){
                this.r_id = val_id;
                this.r_role = val_role;
                this.r_desc = val_desc;
            },
       }
   },
   created: function() {
       axios.get('http://localhost:8000/api/users')
        .then((response) => {
        this.roles = response.data;
        console.log(response.data);
        })
    },
    methods: {
        roleUpdate(){
            let r_id = document.getElementById('r_id').value
            let r_role = document.getElementById('r_role').value
            let r_desc = document.getElementById('r_desc').value

            // alert(r_id);
            axios.put('http://localhost:8000/api/update-role/'+r_id,{id: r_id, role: r_role, desc: r_desc})
            .then((response) => {
                // console.log(response);
                alert(response.data.message);
                document.location.reload();

            })
        }
    }
}
    // $('#role').modal(options)
</script>
<style scoped>
    #show-modal {
        border: none;
        font-weight: bold;
        color: teal;
    }
</style>

