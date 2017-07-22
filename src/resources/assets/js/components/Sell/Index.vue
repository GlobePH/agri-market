<template>

  <layout>

    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Agri-Market</h1>
        <p class="lead text-muted">Items on the market ready for buying. <br> Purchase the items you want by having direct contact with the right supplier.</p>
      </div>
    </section>

    <div class="album text-muted">
      <h2 v-text='message' class='alert alert-success'></h2>
        <div class="container">
          <div class="row">
            <div class="col-sm-4 col-lg-4 col-md-4" v-for='item in items'>
              <sell-item-card :options='item' />
            </div>
        </div>
      </div>
    </div>

  </layout>

</template>

<script>

import api from '../../api/sell';

export default {
  components: {
    Layout: require('../Layout/Master'),
    SellItemCard: require('./SellItemCard'),
  },
  data() {
    return {
      items: [],
      message: 'Loading ...',
    }
  },
  methods: {
    loadItems() {
      api.fetch().then(data => {
        this.items = data;
        this.message = 'Items successfully fetched!';
      });
    },
  },
  mounted() {
    this.loadItems()
  }
}

</script>