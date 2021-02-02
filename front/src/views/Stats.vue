<template>
<div class="main">
    <Nav></Nav>    
    <div id="interetCard">
      <div class="nameInterest">
        <p>{{nom}}</p> 
      </div>
      <div class="deleteInterest">
      </div>     

    </div>
</div>    
</template>
<script>
// @ is an alias to /src
import Nav from '@/components/Nav.vue'

export default {
   name: 'Stats',
   components: {
    Nav,
  },
  props: {
    nom: { type: String, default: 'interet'}
  }
}  
</script>
<style>

#interetCard{
    position:relative;
    box-shadow: 1px 0 5px rgb(250, 249, 249);
    background-color:rgba(240, 228, 228, 0.904);
    width:300px;
    height:50px;
    display:flex;
    margin:20px;
    top:100px;
    justify-content: center;
}
 
p{
  position :absolute;
  font-family: Tahoma
}

</style>