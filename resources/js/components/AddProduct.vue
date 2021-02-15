<template>
    <div>
        <div class="card-header">Product Section</div>
            <!-- -->
            <div class="card-body">
                <table class="table products">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Current Quantity</th>
                            <th>Notes</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="products">
                        <tr v-for="(product,index) in products">
                            <th><span v-html="product.id"></span></th>
                            <td>{{product.name}}</td>
                            <td>{{product.quantity}}</td>
                            <td>{{product.notes}}</td>
                            <td><a class="btn btn-sm btn-light" :href="'api/products/'+ product.id + '/edit'">Edit</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Add Product Section -->
            <div>
                <form @submit.prevent="newProduct">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th scope="col"><input v-model="name" type="text" class="form-control" placeholder="Name" name="name"></th>
                                <th scope="col"><input v-model="quantity" type="text" class="form-control" placeholder="Quantity" name="quantity"></th>
                                <th scope="col"><input v-model="notes" type="text" class="form-control" placeholder="Notes" name="notes"></th>
                                <th scope="col"><button type="submit" class="btn btn-primary">Enter</button></th>
                            </tr>
                        </thead>
                        </table>
                </div>
                </form>
            </div>
                
                <!-- -->
                    <!-- Card Body -->
                <!-- -->
    </div>
</template>

<script>
    export default {
        data()
        {
            return {
                name : null,
                quantity: null,
                notes: null,
                products: null,
                response: null,
            }
        },
        methods:
        {
            newProduct()
            {
                var name = this.name;
                var quantity = this.quantity;
                var notes = this.notes;
                
                if(name == null || this.name == '')
                {
                    name = 'noname'
                }
                if(this.quantity == null || this.quantity == '')
                {
                    var myArray = [31,69];
                    quantity = myArray[Math.floor(Math.random()*myArray.length)];
                }
                axios.post('/api/products/store', {
                    name: name,
                    quantity: quantity,
                    notes: notes,
                })
                .then(response => this.response = response.data.id);
                var gg = this.response;
                this.products.push({"id": "<span class='badge badge-success'>New </span>","name": name, "quantity": quantity, "notes": notes});
                Event.$emit('productCreated');
    
            },

            
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('/api/products')
                .then((response) => {
                this.products = response.data;
                })
                .catch((error) => {
                console.log(error);
                });
        },
    }
</script>
