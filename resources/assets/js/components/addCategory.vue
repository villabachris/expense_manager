<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="addCategory()">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Category</span>
                        </div>
                            <input type="text" class="form-control" v-model="category">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Description</span>
                        </div>
                     
                            <input type="text" class="form-control" v-model="desc">
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
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
            <button type="button" class="btn btn-primary mr-auto" data-toggle="modal" data-target="#addCategory">
            Add Category
            </button>
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
            category: '',
            desc: '',
        }
    },
    methods: {
        addCategory(){
            axios.post('http://localhost:8000/api/add-category/new',{
                category: this.category,
                description: this.desc,
            })
            .then((response)=>{
                console.log(response.data.message);
                document.location.reload();
                // location.href="/user/roles";
            })
            .catch((err) => {
                console.log(err)
            })
        }
    }
}
</script>