<template>
    <div class="col-md-8 mx-auto mt-5">
        <table class="table table-striped">
            <tr>
                <th>Display Name</th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
            <tbody>
                <tr v-for="role in roles" v-bind:key="role.id">
                    <td><a class="text-primary" href="#">{{ role.role }}</a></td>
                    <td>{{ role.description }}</td>
                    <td>{{ role.created_at }}</td>
                </tr>
            </tbody>
        </table>
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

       }
   },
   created: function() {
       axios.get('http://localhost:8000/api/users')
        .then((response) => {
        this.roles = response.data;
        console.log(response.data);
        })
    }
}
</script>
