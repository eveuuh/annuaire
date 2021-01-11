<template>
    <div id="avatar">
      <img :src="'https://avatar.oxro.io/avatar.svg?name='+pseudo+'&background=f39c12&length=1'">
    </div>   
</template>

<style scoped>
  #avatar{
    height:50px;
    width: 50%;
    border-radius:50%;
    background-color:rgb(214, 0, 0);
    display:flex
}
</style>

<script>
export default {
  name: 'Avatar',
  props: [
    "pseudo",
  ],
}
</script>  