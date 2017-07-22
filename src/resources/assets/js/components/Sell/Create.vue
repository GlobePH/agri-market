<template>

	<layout>
		<section class="jumbotron text-center">
			<div class="container">
			<h1 class="jumbotron-heading">Selling > Create</h1>

			<form method="POST" action="#" @submit.prevent='submit'>

				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="name" name="name" v-model="form.name" />
					</div>
					<p class='help-block error' v-text='error.name'></p>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Description</label>
					<div class="col-sm-10">
						<textarea class="form-control" id="description" name="description" v-model="form.description"></textarea>
					</div>
					<p class='help-block' v-text='error.description'></p>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Unit Price</label>
					<div class="col-sm-10">
						<input type="text" class="form-control text-right" id="unitprice" name="unitprice"  v-model="form.unitprice"/>
					</div>
					<p class='help-block' v-text='error.unitprice'></p>
				</div>

				<div class="form-group row">
					<label for="name" class="col-sm-2 col-form-label">Quantity</label>
					<div class="col-sm-10">
						<input type="text" class="form-control text-right" id="quantity" name="quantity" v-model="form.quantity" />
					</div>
					<p class='help-block' v-text='error.quantity'></p>
				</div>
				
				<div class="form-group row">
					<div class="offset-sm-2 col-sm-10">
						<button type="submit" class="btn btn-primary">Save</button>
						<a href="javascript:;" class="btn btn-primary" @click='cancel'>Cancel</a>
					</div>
				</div>
			</form>

			<!-- @include('partials.error') -->

			</div>
		</section>
	</layout>

</template>

<script>

import api from '../../api/sell';

export default {
	components: {
		Layout: require('../Layout/Master'),
	},
	data() {
		return {
			error: {

			},
			form: {
				name: '',
				description: '',
				unitprice: '',
				quantity: '',
			}
		}
	},
	methods: {
		cancel() {
			this.$router.go(-1);
		},
		submit() {
			
			api.store(this.form)
				.then(data => {

					if (data.error) {
						console.log(data.error);
						this.error = data.error;
					} else {
						/*console.log('test');*/
						this.$router.push({name: 'sell-myitem'});
						/*this.$router.push({name: 'sell-show', params: {id: data.id}});*/
					}

				});
		}
	}
}
</script>