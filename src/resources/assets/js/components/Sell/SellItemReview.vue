<template>

  <div>

    <div class="row">

      <div class="col-md-12">

          <span class="glyphicon glyphicon-star" 
            :class="{'glyphicon-star-empty': options.rating < i}" 
            v-for='i in 5'></span>
          
          {{ options.user.name }}
          <span class="pull-right" v-text='options.human_created_at'>10 days ago</span>
          <p v-text='options.review'>This product was great in terms of quality. I would definitely buy another!</p>
      </div>

    </div>

  </div>

</template>

<script>
export default {
  props: ['options'],
}
</script>