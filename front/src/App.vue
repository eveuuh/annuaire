<template>
  <div id="app">
    <router-view/>
  </div>
</template>

<script>
export default {
  name: 'app', 
}
</script>

<style lang="scss">
  body {
    margin: 0;
    padding: 0;
  }
  #app {
    font-family: Tahoma;
    font-size: 18px;
    color: #222;
    background: linear-gradient(to bottom, #1C8A82, #147871);
    height: 100vh;
    justify-content: center;
    align-items: center;
    margin-top: 100px;
  }
</style>