<template>
  
  <layout>
    
    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Selling > Photo Upload</h1>

        <form class='dropzone' id='photo-import'>
          <div class="fallback">
            <div class="form-group">
              <label for="file">File (*.csv)</label>
              <input name="file" type="file" id="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Import</button>
          </div>

        <!-- <form method="POST" action="#" enctype="multipart/form-data" @submit.prevent='submit'>

        <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Avatar</label>
          <div class="col-sm-8">
            <input type="file" class="form-control text-right" name="avatar" id="avatar" />
            <p class='help-block' v-text='error.avatar'></p>
          </div>
        </div> -->

        <!-- <div class="form-group row">
          <label for="name" class="col-sm-3 col-form-label">Photo Album (Max 5)</label>
          <div class="col-sm-8">
            <input type="file" class="form-control text-right" name="photo1" id="photo1"/>
            <input type="file" class="form-control text-right" name="photo2" id="photo2"/>
            <input type="file" class="form-control text-right" name="photo3" id="photo3"/>
            <input type="file" class="form-control text-right" name="photo4" id="photo4"/>
            <input type="file" class="form-control text-right" name="photo5" id="photo5"/>
          </div>
        </div> -->


          <!--<div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Save</button>
              <a href="javascript:;" class="btn btn-primary" @click='cancel'>Cancel</a>
            </div>
          </div>-->

        </form>

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
    let vm = this;
    let sellId = this.$route.params.id;
    return {
      dropzone: {
        init: function() {
          // this.on('success', (file, response) => vm.close(response));
        },
        url: (file) => `/api/sell/${sellId}/upload-photo`,
        headers: axios.defaults.headers.common,
        paramName: "file",
        // acceptedFiles: 'image/jpeg,image/png,image/jpg',
        maxFiles: 1,
      },
      error: {

      },
      form: {
        avatar: '',
      }
    }
  },
  methods: {
    cancel() {
      this.$router.go(-1);
    },
    submit() {
      alert('test');
    }
  },
  mounted() {
    console.log(this.$route.params.id);
    $('#photo-import').dropzone(this.dropzone);
  }
}

</script>