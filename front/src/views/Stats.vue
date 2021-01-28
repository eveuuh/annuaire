<template>
  <div class="about">
     <Nav></Nav>
    <h1>Stats</h1>
  </div>
</template>
<script>
// @ is an alias to /src
import Member from '@/components/Member.vue'
import Nav from '@/components/Nav.vue'
 
export default {
   name: 'Stats',
   components: {
    Nav,
    Member,
  }
};  
</script>