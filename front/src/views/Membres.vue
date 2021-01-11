<template>
  <div id="membres">
    <Nav></Nav>
    <h1>Voici les membres</h1>
  </div>
</template>
<script>
// @ is an alias to /src
import Nav from '@/components/Nav.vue'

export default {
  
  name: 'Membres',
   components: {
    Nav,
  },
};
</script>
<style>

  #membres {
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
