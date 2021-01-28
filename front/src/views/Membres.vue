<template>
  <div id="membres">
    <Nav></Nav>
    <div class="members">
      <h1>Voici les membres</h1>
      <Member v-for="(adherent, id) in adherents"
       :pseudo="adherent.Pseudo"
       :prenom="adherent.Prenom"
       :dateadhesion="adherent.DateAdhesion"
       :img="adherent.Photo"
       :id="adherent.id"
       :key="id"
       />
    </div>
  </div>
</template>
<script>
// @ is an alias to /src
import Nav from '@/components/Nav.vue'
import Member from '@/components/Member.vue'

export default {
  
  name: 'Membres',
   components: {
    Nav,
    Member,
  },
  data: () => {
    return {
      connected:true,
      password:null,
      photo:null,
      adherents: [
        {id:""},
        {prenom:""},
        {pseudo:""},
        {dateadhesion:""}
      
      ],
      profils: [
        { photo:""},
        
      ]
    }
  }, 
 
    mounted: function () {
      fetch('http://www.back.poney.local/connected.php', {credentials:'include'})
            .then(response => response.json())
            .then((data) => {this.connected = data.connected;this.prenom=data.prenom; this.pseudo = data.pseudo; this.photo=data.photo; this.dateadhesion=data.dateadhesion});
    
      const requestOptions = {
          method: "GET",
          credentials:'include'
      } 
      fetch('http://www.back.poney.local/members.php', {credentials:'include'})
       .then(response => response.json())
        .then(data =>(this.adherents=data))
        
      }
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
  li{
    color:white;
    list-style-type:none;
  }
</style>
