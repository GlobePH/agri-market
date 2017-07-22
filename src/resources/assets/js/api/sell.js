export default {
	fetch() {
		return axios.get('/api/selling-items')
				.then(response => {
					return response.data
				});
	},

	store(request) {
		return axios.post('/api/sell', request)
			.then(response => {
				return response.data;
			}).catch(error => {
				return { error: error.response.data }
			});
	},

	show(id) {
		return axios.get(`api/sell/${id}`)
				.then(response => {
					return response.data
				}).catch(error => {
					return { error: error.response.data }
				});
	},

	fetchItemByUser() {
		return axios.get('/api/sell-item-by-user')
				.then(response => {
					return response.data
				});	
	},

	changeStatus(id, status) {
		return axios.put(`api/sell-change-status/${id}/${status}`)
				.then(response => {
					return response.data
				});
	},

	edit(id) {
		return axios.get(`api/sell/${id}/edit`)
				.then(response => {
					return response.data
				}).catch(error => {
					if (error.response.status == 403) {
						// console.log('hey', error.response.status);
						return { error: 'Unathorized' }
					} else if (error.response.status == 422) {
						return { error: error.response.data }
					}
				});
	},

	update(request, id) {
		return axios.put(`/api/sell/${id}`, request)
				.then(response => {
					return response.data
				}).catch(error => {
					return { error: error.response.data }
				});
	}


	

	/*show(id) {
			axios.get(`/sell/${id}`)
			// axios.get('/sell/' + id)
				.then(response => {

				}).catch(error => {
					console.log(error.response);
				});
		}*/
}