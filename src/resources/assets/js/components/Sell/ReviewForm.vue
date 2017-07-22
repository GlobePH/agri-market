<template>

  <div>
    <div class="text-right">
    <p v-if='message!="x"' v-text='message' class='alert alert-success'></p>
      <form action="#" method="POST" @submit.prevent='submit'>

        <textarea class="form-control" rows="5" id="review" name="review" v-model='form.review'></textarea>
        <p class='help-block alert-danger' v-text='error.review'></p>
        <br>
        <select name="rating" id="rating" v-model='form.rating'>

          <option :value='6-i' v-for="i in 5">{{ 6-i }}</option>

        </select>

        <button type="submit" class="btn btn-success">Leave a Review</button>

      </form>
  
    </div>
    <br> 
  </div>

</template>

<script>


import api from '../../api/sellreview';

export default {
  props: ['id'],
  data() {
    return {
      error: {
      },
      form: {
        review: '',
        rating: 5,
      },
      message: 'x',
    }
  },
  methods: {
    submit() {
      api.store(this.form, this.id)
        .then(data => {
          if (data.error) {
            this.error = data.error;
          } else {
            this.$emit('success');
            this.form.review = '';
            this.message = 'Review successfully submitted....';
            this.error = {};
          }
        });
    }
  }
}

</script>