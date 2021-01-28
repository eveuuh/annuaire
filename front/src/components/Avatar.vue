<template>
    <div id="avatar">
      <img :src="calculatedImgURL" alt="ProfileImage">
    </div>   
</template>

<style scoped>
  
img {
  height:70px;
  width: 70px;
  border-radius:50%
}
</style>

<script>
export default {
  name: 'Avatar',
  props: {
    pseudo:"",
    img: {type: String, default:null}
  },
  computed: {
    calculatedImgURL () {
      if (!this.img) {
        return 'https://avatar.oxro.io/avatar.svg?name='+this.pseudo+'&background=Random&length=1&bold=true&caps=1'
      }
    return process.env.VUE_APP_BACKURL+this.img
    }
  }
}
</script>   
