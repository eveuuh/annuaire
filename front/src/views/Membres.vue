<template>
  <div id="membres">
    <Nav></Nav>
    <div v-for="adherents, id in adherents" v-bind ="id">
    <h1>Voici les membres</h1>
    <p :pseudo="pseudo">{{pseudo}}</p>
    <p>{{adherent.pseudo}}</p>
    </div>
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
  data: () => {
    return {
      connected:true,
      pseudo:"toto", 
      password:null,
      photo:null,
      prenom:"toto",
      adherents: []
    }
  }, 
 
    mounted: function () {
      fetch('http://www.back.poney.local/connected.php', {credentials:'include'})
            .then(response => response.json())
            .then((data) => {this.connected = data.connected;this.prenom=data.prenom; this.pseudo = data.pseudo; this.photo=data.photo});
    
       const requestOptions = {
          method: "GET",
          credentials:'include'
        } 
      fetch('http://www.back.poney.local/members.php', {credentials:'include'})
       .then(response => response.json())
        .then(data =>(console.log(data)))
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
  h1{
    color:white;
  }
  p{
    color:white
  }
</style>
