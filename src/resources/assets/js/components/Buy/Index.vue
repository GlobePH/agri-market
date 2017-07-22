<template>
  
  <layout>
    
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Agri-Market</h1>
        <p class="lead text-muted">Items needed on the market. <br> Inform the suppliers of items needed by consumers. </p>
      </div>
    </section>

    <div class="album text-muted">
      <h2 v-text='message' class='alert alert-success'></h2>
        <div class="container">
          <div class="row">
            <!-- <div class="col-sm-4 col-lg-4 col-md-4" v-for='item in items'>
              <sell-item-card :options='item' />
            </div> -->
        </div>
      </div>
    </div>

  </layout>

</template>

<script>

export default {
  components: {
    Layout: require('../Layout/Master'),
  },
  data() {
    return  {
      message: 'Loading ...',
    }
  }
}

</script>