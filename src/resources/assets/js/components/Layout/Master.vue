<template>

	<div id="container">

		<navigation />

		<slot></slot>

		<foot />

	</div>

</template>

<script>

export default{
	components: {
		Foot: require('./Footer'),
		Navigation: require('./Nav'),
	},
}

</script>