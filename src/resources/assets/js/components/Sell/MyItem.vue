<template>
  
  <layout>
    
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Agri Market Items</h1>
        <p class="lead text-muted">Show what you can offer and provide. <br> Place your items on the market to expand your business.     
        <p>
          Work hand in hand with others. <br> Post what assistance and support you need.   
        <p>
          <router-link :to='{name: "sell-create"}' class='btn btn-primary'>Post item to sell</router-link>
          <router-link :to='{name: "buy-create"}' class='btn btn-success'>Post item to buy</router-link>
        </p>
      </div>
    </section>

    <div class="album text-muted">
      <h2 v-if='message' v-text='message' class='alert alert-success'></h2>
      <div class="container">

        <div class="row">


          <div class="col-sm-4 col-lg-4 col-md-4" v-for='item in items'>

            <sell-item :options='item' @changeStatus='changeStatus'/>  

          </div>

        </div>

      </div>

    </div>

  </layout>

</template>

<script>

import api from '../../api/sell';

export default  {
  components: {
    Layout: require('../Layout/Master'),
    SellItem: require('./SellItem'),
  },
  data() {
    return {
      items: [],
      message: '',
    }
  },
  methods: {
    loadSellItem() {
      api.fetchItemByUser().then(data => {
        this.items = data;
        // this.message = 'Items successfully fetched!';
      });
    },
    refresh() {
      this.loadSellItem();
    },
    changeStatus(data) {
      let status = (data.status == 'U') ? 'Unpost' : 'Posted';
      this.message = 'Item:' + data.name + ' ' + status;
    }
  },
  mounted(){
    this.loadSellItem();
    this.message = this.$route.params.message;
  }
 
}

</script>