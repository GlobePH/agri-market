<template>
	
	<div class="thumbnail">
    <span style='display:inline-block;overflow:hidden;width:350px;height:280px;'>
		  <img :src='image' alt="" style='height:280px;width:auto;margin:auto;'>
    </span>
		<div class="caption">
			<h4 class="pull-right">&#8369; <formatted-number :text='options.unitprice' format='0,0.00' /></span></h4>
			<h4><router-link :to='{name: "sell-show", params:{id: options.id} }' v-text='options.name'></router-link></h4>
			<p v-text='options.description'></p>
			<p class="text-success">
        <formatted-number :text='options.quantity' class="pull-left" />
      </p>
		</div>
		<div class="ratings">
			<p class="pull-right">12 reviews</p>
			<p>
				<span v-text='options.human_created_at'></span>
				<!-- <span v-text='options.formatted_created_at'></span> -->
			</p>
			<p>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star"></span>
				<span class="glyphicon glyphicon-star-empty"></span>
			</p>
			<span v-text='options.user.name'></span>
			<span v-text='options.quantity' class="pull-right"></span>
		</div>
	</div>

</template>

<script>

export default {
  components: {
    FormattedNumber: require('../FormattedNumber'),
  },
	props: ['options'],
	methods: {
    format(number) {
      return numeral(number).format('0,0.00');
    },
  },
  data() {
  	return {
  		image: '/img/350x280default.png',
  	}
  },
  mounted() {
  	if (this.options.avatar != null) {
  		this.image = '/storage/avatars/' + this.options.avatar;
  	}
  }
}

</script>