<template>
	<layout>

		<section class="jumbotron text-center" style="border-style: dotted;">Advertisement</section>
		<!-- Page Content -->
		    <div class="container">

		        <div class="row">

		            <div class="col-md-3">
		                
						<div class="thumbnail">
						
							<img src="http://localhost/img/320x150.png" alt="">
							<div class="caption">
								<h4 class="pull-right">&#8369; 1,500.00 </h4>
								<h4><a href="http://localhost/sell/1">Rhode Island</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>

						</div>

						<div class="thumbnail">
						
							<img src="http://localhost/img/320x150.png" alt="">
							<div class="caption">
								<h4 class="pull-right">&#8369; 1,500.00 </h4>
								<h4><a href="http://localhost/sell/1">Rhode Island</a>
								</h4>
								<p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							</div>

						</div>	

		            </div>

		            <div class="col-md-9">

		                <div class="thumbnail">
		                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
		                    <div class="caption-full">
		                        <h4 class="pull-right">&#8369; <formatted-number :text='item.unitprice' format='0,0.00' /></h4>
		                        <h4><a href="#" v-text='item.name'><!-- {{ $sell->name }} --></a>
		                        </h4>
		                        <p v-text='item.description'></p>
		                        <p class="text-success">
											        <formatted-number :text='item.quantity' class="pull-left" />
											      </p>
											      <br>
		                    </div>
		                    <div class="ratings">
		                        <p class="pull-right">{{ item.count_review }} reviews</p>
		                        <p>
		                        	<span class="glyphicon glyphicon-star" 
										              :class="{'glyphicon-star-empty': item.overall_rating < i}" 
										              v-for='i in 5'></span>
		                           
		                            {{ format(item.overall_rating) }} stars
		                        </p>
		                    </div>
		                </div>


		                <review-form v-if='loggedIn && !owned' :id='item.id' @success='reloadReview' />

		                <div class="well" v-for='review in itemReviews' >

		                	<sell-item-review :options='review' />
		                    
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
		SellItemReview: require('./SellItemReview'),
		ReviewForm: require('./ReviewForm'),
		FormattedNumber: require('../FormattedNumber'),
	},
	methods: {
		format(number) {
			return numeral(number).format('0,0.00');
		},
		show() {
			api.show(this.$route.params.id)
				.then(data => {
					this.item = data;
					this.itemReviews = data.sell_review;
				});
		},
		reloadReview() {
			this.show();
		}
	},
	data() {
		return {
			item:{
				id: '',
				name: '',
				description: '',
				unitprice: '',
				quantity: '',
			},
			itemReviews: [],
		}
	},
	computed: {
      loggedIn() {
        return this.$store.state.user.id;
      },
      owned() {
      	return this.$store.state.user.id == this.item.user_id;
      },
  },
  watch: {
  	loggedIn(data) {
  		console.log(data);
  	}
  },
	mounted() {
		// this.show();
	},
	beforeRouteEnter(to, from, next) {
		api.show(to.params.id)
			.then(data => {
				next(vm => {
					vm.item = data;
					vm.itemReviews = data.sell_review;
				});
			});
	}
}

</script>