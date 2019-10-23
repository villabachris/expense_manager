<template>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="addUser" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Expense</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form @submit.prevent="addExpense()">
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Expense Category</span>
                        </div>
                            <select name="category" id="cat" class="form-control" v-model="cat">
                                <option value="" disabled selected><i>Selec Category...</i></option>
                                <option v-for="cat in category" v-bind:key="cat.id" :value="cat.id">{{cat.category}}</option>
                            </select>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Amount</span>
                        </div>
                            <input type="number" step="00.01" min="0.00" value="0.01" class="form-control" v-model="amount">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Entry Date</span>
                        </div>
                            <input type="date" class="form-control" v-model="date">
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
            Add Expense
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
            expenses: [],
            category: [],
            cat: '',
            u_id: document.querySelector('meta[name=user_id]').getAttribute('content'),
            amount: '',
            date: '',
        }
    },
    created: function(){
        axios.get('http://localhost:8000/api/category/get')
        .then((response) => {
            this.category = response.data;
            // console.log(response.data);
        })
    },
    methods: {
        addExpense(){
            axios.post('http://localhost:8000/api/add-expense/new',{
                cat: this.cat,
                u_id: this.u_id,
                amount: this.amount,
                date: this.date,
            })
            .then((response)=>{
                console.log(response.data);
            })
            .catch((err) => {
                console.log(err)
            })
        }
    }
}
</script>