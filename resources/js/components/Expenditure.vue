<template>
    <div>
        <div class="card-header">Expenditure Section
        </div>
         <div class="card-body">
                   <div class="row">
                       <!-- Testing -->
                        <pre></pre>
                        <!-- Testing End -->
                       <div class="col-md-12">
                           <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <input type="text" class="form-group form-control" placeholder="Search for product" v-model="searchQuery">
                                <small>Keyword or product code. Come on, write something you remember  <span> </span></small>
                            </div>
                            </div>
                       </div>

                      <div class="col-md-4" v-for="product in resultQuery" style="margin-bottom: 3%;">
                          <ul class="list-group">
                                <li class="list-group-item"><strong>{{product.name}}</strong</li>
                                <li class="list-group-item"><strong>Before: {{product.quantity}}pcs / Remaining: </strong</li>
                                <li class="list-group-item" v-for="(expenditure,index) in product.expenditures">
                                    <strong>{{expenditure.date}} - {{expenditure.quantity}} pcs</strong>
                                    <button class="btn btn-dark btn-sm" style="float:right;" @click="removeExpenditure(product.id,index,expenditure.id)">Remove / ID: <span v-html="expenditure.id"></span> / INDEX: {{index}}</button>
                                </li>
                          </ul>
                      </div>
                    </div> 
                </div>

                <div>
                <div class="card-body">
                    <form @submit.prevent="newExpenditure">
                    <div class="row">
                            <div class="col-md-12 form-group">
                                <select class="form-control" v-model="id">
                                    <option value="0">Select product</option>
                                    <option v-for="product in products" v-bind:value="product.id">{{product.name}}</option>
                                </select>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="date" class="form-control" v-model="date" placeholder="Date">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="quantity" class="form-control" v-model="quantity" placeholder="Quantity">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="notes" class="form-control" v-model="notes" placeholder="Notes">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="submit" class="form-control btn btn-primary">
                            </div>
                    </div>
                    </form>
                </div>

                
                <!-- Testing -->
                <pre></pre>
                <!-- Testing End -->
                </div>  
    </div>
</template>

<script>

   import AddProduct from './AddProduct'

    export default {
        components: {
          AddProduct
        },
        mounted() {
            console.log('Component mounted.');
            axios.get('/api/products')
                .then((response) => {
                this.products = response.data;
                this.productsExpenditures = response.data;
                })
                .catch((error) => {
                console.log(error);
                });

        Event.$on('productCreated', ({id,name,quantity,notes}) => {
            this.products.push({"id": id, "name": name, "quantity": quantity, "notes": notes, expenditures: []});
        });
        Event.$on('productDeleted', ({index}) => {
            this.products.splice(index,1);
        });        
            
            
        },
        computed: {
                    resultQuery(){
                    if(this.searchQuery){
                        return this.products.filter((item)=>{
                        return this.searchQuery.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
                    })
                    }else{
                        return this.products;
                    }
                },
            },
        data()
        {
            return{
                id: 0,
                quantity: null,
                date: null,
                notes: null,
                products: [],
                productsExpenditures: [],
                getstatus: [],
                searchQuery: '',
            }
        },
        methods:
        {
            newExpenditure()
            {
                var productid = this.id;
                var date = this.date;
                var quantity = this.quantity;
                var notes = this.notes;

                this.newExpenditureAxios(productid,date,quantity,notes);
                
                
            },
            newExpenditureAxios(productid,date,quantity,notes)
            {
                axios.post('/api/expenditures/store', {
                    id: productid,
                    date: date,
                    quantity: quantity,
                    notes: notes,
                })
                .then(response => this.testFunc(response.data.id, date, quantity, notes, productid));
            },
            testFunc(responseid,date,quantity,notes,productid)
            {
                var getProduct = this.products.map(function(x) {return x.id; }).indexOf(productid);
                this.products[getProduct].expenditures.push({"id": responseid,'date': date,'quantity': quantity,'notes': notes});
                
                
            },
            testMethod()
            {
                
                //this.getstatus = this.products[1];
                //var first = this.products.find(item => item.id === 101);
                //this.getstatus = first.ex;
                
                var elementPos = this.products.map(function(x) {return x.id; }).indexOf(101);
                this.getstatus = elementPos;
                //this.products[100]
            },
            removeExpenditure(id,index, expenditure)
            {
                //alert(expenditure);
                axios.delete('/api/expenditures/'+ expenditure + '/destroy', {
                    data: {
                        
                    }
                })
                .then(response => this.getstatus = response.data);
                var getProduct = this.products.map(function(x) {return x.id; }).indexOf(id);
                this.$delete(this.products[getProduct].expenditures, index)
            }
            //myArraySum(){
            //    var sum = [1,2,3,4,5].reduce(function(a,b){
            //        return a+b;
            //    }, 0);
            //    //ar gg = [];
            //    //foreach(item in myArr)
            //    //{
            //    //    gg = myArr.expenditures;
            //    //}
            //    //return sum;
            //}
        }
    }
</script>
