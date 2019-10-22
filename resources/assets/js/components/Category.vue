<template>
<div>   
    <!-- Modal -->
    <div v-if="showModal"  class="modal fade" id="updateUser" tabindex="-1" role="dialog">
    <div class="modal-dialog"  role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            <button type="button" class="close" @click="showModal=false" data-dismiss="modal">
            <span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <input type="hidden" id="id" disabled class="form-control" :value="this.c_id">
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Category</span>
                    </div>
                        <input type="text" class="form-control" required :value="this.c_category" id="category">
                </div>
                <div class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Description</span>
                    </div>
                    <input type="text" id="desc" class="form-control" required :value="this.c_desc">
                </div>
        </div>
        <div class="modal-footer">
                <button type="button" class="btn btn-primary" @click="categoryUpdate()">Update</button>
                <button type="button" class="btn btn-primary" @click="showModal=false" data-dismiss="modal">close</button>
        </div>
        </div>
    </div>
    </div>


    <div>
        <table class="table table-striped">
            <tr>
                <th>Category</th>
                <th>Description</th>
                <th>Created at</th>
            </tr>
            <tbody>
                <tr v-for="cat in categories"  v-bind:key="cat.id">
                    <td><span class="btn btn-default" id="show-modal" @click="showModal=true;catVal(cat.id, cat.category, cat.description)" data-toggle="modal" data-target="#updateUser">{{ cat.category }}</span></td>
                    <td>{{ cat.description }}</td>
                    <td>{{ cat.created_at }}</td>
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
           categories: [],
           showModal: false,
           catVal(val_id, val_category, val_description){
               this.c_id = val_id;
               this.c_category = val_category;
               this.c_desc = val_description;
           },
        }
    },
    created: function(){
        axios.get('http://localhost:8000/api/all/categories')
        .then((response) => {
            this.categories = response.data;
            console.log(response.data);
        })
    },
    methods: {
        categoryUpdate(){
            let id = document.getElementById('id').value;
            let category = document.getElementById('category').value;
            let desc = document.getElementById('desc').value;

            axios.put('http://localhost:8000/api/update-category/'+id,{
                category: category,
                desc: desc,})
            .then((response) => {
                alert(response.data.message);
                document.location.reload();
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

