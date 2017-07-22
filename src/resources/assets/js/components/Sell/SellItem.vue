<template>

  <div class="thumbnail">
      <span style='display:inline-block;overflow:hidden;width:350px;height:180px;'>
        <img :src='image' alt="">
      </span>
      <div class="caption">
          <div class="row">
            <div class="col-sm-8">
              <!-- <h4 class="pull-left">&#8369; <span v-text='format(item.unitprice)'></span></h4> -->
              <h4 class="pull-left">&#8369; <formatted-number :text='item.unitprice' format='0,0.00' /></h4>
              <p class="text-success">
                <formatted-number :text='item.quantity' class="pull-left" />
              </p>
            </div>
            <div class="col-sm-4 text-right">
              <router-link :to='{name: "sell-edit", params:{ id: item.id } }'>Edit</router-link>
            </div>
            <div class="col-sm-4 text-right"><router-link :to='{name: "sell-photo", params:{ id: item.id } }'>Photo</router-link></div>
            <div class="col-sm-4 text-right">
              <a href='javascript:;' @click='changeStatus(item.id, status)'>{{ status }}</a>
            </div>
          </div>
          <h4><router-link :to='{ name: "sell-show", params:{ id: item.id } }' v-text='item.name'></router-link></h4>
          </h4>
          <p v-text='item.description'></p>
      </div>
      <div class="ratings">
        <p class="pull-right"><span v-text='item.count_review'></span> reviews</p>
        <p>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span>
          <span class="glyphicon glyphicon-star"></span> 
        </p>
      </div>
  </div>

</template>

<script>
import api from '../../api/sell';
// import util_num from '../../utils/number.js';

export default {
  components: {
    FormattedNumber: require('../FormattedNumber'),
  },
  props: ['options'],
  methods: {
    changeStatus(id, status) {
      api.changeStatus(id, status)
        .then(data => {
          // this.$emit('nagbalyo');
          // console.log(data);
          this.item = data;
          this.$emit('changeStatus', data);
          /*
          if (data.status == 'U') {
            this.status = 'Post';
          } else {
            this.status = 'Unpost';
          }
          */
        });

      console.log(id, status);
    }
  },
  data() {
    return {
      item: {},
      // status: 'Unpost',
      image: '/img/320x150default.png',
    }
  },
  computed: {
    status() {
      if (this.item.status == 'U') {
        return 'Post';
      } else {
        return 'Unpost';
      }
    },
  },
  created() {
    this.item = Object.assign({}, this.options);
    if (this.options.avatar != null) {
      this.image = '/storage/avatars/' + this.options.avatar;
    }
    // this.item = {...this.options}; 
    // this.item = this.options; 
    // console.log(this.options.status);
  }
}

</script>
