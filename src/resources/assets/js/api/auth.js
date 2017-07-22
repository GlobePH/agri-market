export default {
	user() {
		return axios.get('/api/user')
			.then(response => response.data)
			.catch(error => {
				return { error: error.response };
			});
	}
}