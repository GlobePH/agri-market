<template>
	<layout>
		
		<section class="jumbotron text-center">
		  <div class="container">
		    <h1 class="jumbotron-heading">Agri-Market</h1>
		    <p class="lead text-muted">A marketplace for agricultural suppliers and consumers to connect <br>and become aware of supply and demand trends.  
		    <p>
		      <router-link :to='{name: "sell"}' class='btn btn-primary'>View more Items for Sale ....</router-link>
		      <router-link :to='{name: "buy"}' class='btn btn-success'>View Items on Demand ....</router-link>
		    </p>
		  </div>
		</section>
		<div class="album text-muted">
			<h2 v-text='message' class='alert alert-success'></h2>
		  	<div class="container">
			    <div class="row">
			    	<div class="col-sm-4 col-lg-4 col-md-4" v-for='item in items'>
			    		<sell-item-card :options='item' />
			    	</div>
				    <!-- <div class="col-sm-4 col-lg-4 col-md-4" v-for='n in 9'>
				        <sell-item-card />
				    </div> -->
				</div>
			</div>
		</div>
	</layout>
</template>

<script>

import api from '../api/sell';

export default {
	components: {
		Layout: require('./Layout/Master'),
		SellItemCard: require('./Sell/SellItemCard'),
	},
	data() {
		return {
			items: [],
			message: 'Loading...',
		}
	},
	methods: {
		loadItems() {
			api.fetch().then(data => {
				this.items = data;
				this.message = 'Items successfully fetched!';
			});
			
		},
		buy() {
			alert('test');
		}
	},
	mounted() {
		this.loadItems()
	}
}

</script>