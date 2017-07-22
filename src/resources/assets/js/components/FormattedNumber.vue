<template>
  <span v-text='formatNumber(text)'></span>
</template>
<script>
export default {
  props: ['text', 'format'],
  data() {
    return {

    }
  },
  methods: {
    formatNumber(number){
      // let format = '0,0';
      return numeral(number).format(this.format || '0,0');
    },
    /*formatTwoDecimal(number) {
      return numeral(number).format('0,0.00');
    },*/
  }
}
</script>