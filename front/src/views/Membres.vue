<template>
  <div id="membres">
    <Nav></Nav>    
    <div class="members">
      <h1>Voici les membres</h1>
        <div class="searching">
          <input type="text" class="search" v-model="search" placeholder="Chercher par Nom ou Pseudo">
          <button v-on:click="search">Rechercher</button>
        </div>

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
    Member   
  },
  data: () => {
    return {
      current:1,
      connected:true,
      password:null,
      photo:null,
      search:[],
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
        .then(data =>{console.log(data),this.adherents=data})
        
      },
    
    methods:{
      search() {
      let formParams = new URLSearchParams();
      formParams.append("search",this.search);
          const requestOptions = {
            method: "GET",
            credentials:'include'
          } 
      fetch('http://www.back.poney.local/searchmembers.php', requestOptions )
        .then(response => response.json())
        .then(data =>{console.log(data),this.search=data})
      },  
    }
    
}


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
    text-align: center;
    font-family: Tahoma;

  }
  li{
    color:white;
    list-style-type:none;
  }

  input.search{
    display:block;
    height:30px;
    width:300px;
    border:none;
    border-radius:5px 0px 0px 5px;
    outline:none
  }
  :placeholder-shown{
    margin-left: 10px;
  }
  button{
    border:none;
    border-radius:0px 5px 5px 0px;
    background-color:white;
    outline:none;
    cursor:pointer;
    color:#147871;
    font-size:14px
  }
  .searching {
    display: flex;
    justify-content: center;
  }
</style>
