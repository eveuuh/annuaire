<template>
    <div id="avatar">
      <img :src="'https://avatar.oxro.io/avatar.svg?name='+pseudo+'&background=Random&length=1&bold=true&caps=1'">
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
  props: [
    "pseudo",
  ],
  
}
</script>   
