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
                            <th>Edit</th>
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
                            <td><button class="btn btn-sm btn-danger" v-on:click="removeProduct(product.id,index)">Delete</button></td>
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
        data()
        {
            return {
                name : null,
                quantity: null,
                notes: null,
                products: null,
                getresponse: null,
            }
        },
        methods:
        {
            newProduct()
            {
                var name = this.name;
                var quantity = this.quantity;
                var notes = this.notes;
                var id;
                if(name == null || this.name == '')
                {
                    name = 'noname'
                }
                if(this.quantity == null || this.quantity == '')
                {
                    var myArray = [31,69];
                    quantity = myArray[Math.floor(Math.random()*myArray.length)];
                }
                
                this.newProductAxios(name,quantity,notes);
    
            },
            newProductAxios(name,quantity,notes)
            {
                axios.post('/api/products/store', {
                    name: name,
                    quantity: quantity,
                    notes: notes,
                })
                .then(response => this.testFunc(response.data.id,name,quantity,notes));
            },
            testFunc(id,name,quantity,notes)
            {
                this.products.push({"id": id,"name": name, "quantity": quantity, "notes": notes, "current": 0});
                Event.$emit('productCreated', {"id" : id, "name": name, "quantity" : quantity, "notes": notes, "current": 0});
            },
            removeProduct(productid,index)
            {
                this.products.splice(index,1);
                axios.delete('/api/products/'+productid+'/destroy', {

                })
                .then(response => console.log(response));
                Event.$emit('productDeleted', {"index" : index});
            }

            
        },
        
    }
</script>
