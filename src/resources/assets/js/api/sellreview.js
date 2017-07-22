export default {
	store(request, id) {
		return axios.post(`/api/sellreview/${id}`, request)
			.then(response => {
				return response.data
			}).catch(error => {
				return { error: error.response.data }
			});
	}
}