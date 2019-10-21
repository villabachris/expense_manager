<template>
<div>
    <!-- Modal -->
   
    <div>
        <table class="table table-striped">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created_at</th>
            </tr>
            <tbody>
                <tr v-for="user in users" v-bind:key="user.id">
                    <td data-toggle="modal" data-target="#role">{{ user.name }}</td>
                    <td>{{ user.email }}</td>
                    <td v-if="user.role_id == 1">Administrator</td>
                    <td v-else>User</td>
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
        //    rolesUpdate: [],
        //    showModal: false,
            // roleVal(val_id, val_role, val_desc){
            //     this.r_id = val_id;
            //     this.r_role = val_role;
            //     this.r_desc = val_desc;
            // },
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
        // roleUpdate(){
        //     let r_id = document.getElementById('r_id').value
        //     let r_role = document.getElementById('r_role').value
        //     let r_desc = document.getElementById('r_desc').value

        //     // alert(r_id);
        //     axios.put('http://localhost:8000/api/update-role/'+r_id,{id: r_id, role: r_role, desc: r_desc})
        //     .then((response) => {
        //         // console.log(response);
        //         alert(response.data.message);
        //         document.location.reload();

        //     })
        // }
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

