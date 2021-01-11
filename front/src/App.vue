<template>
  <div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
      <router-link to="/login">Login</router-link>
      <router-link to="/profile">Mon Profil</router-link>
      <router-link to="/membres">Membres</router-link>
      <router-link to="/stats">Stats</router-link>
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
    display: flex;
    justify-content: center;
    align-items: center;
  }
</style>