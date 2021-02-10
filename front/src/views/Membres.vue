<template>
  <div id="membres">
    <Nav></Nav>    
    <div class="members">
      <h1>Voici les membres</h1>
        <div class="searching">
          <input type="text" class="search" v-model="search" placeholder="Chercher par Nom ou Pseudo">
          <button v-on:click="searchMembers">Rechercher</button>
        </div>

     
      <Member v-for="(adherent, id) in adherents"
       :pseudo="adherent.Pseudo"
       :prenom="adherent.Prenom"
       :dateadhesion="adherent.DateAdhesion"
       :img="adherent.Photo"
       :id="adherent.id"
       :key="id"

       />
    
      <div class="pagination">
        <button class="btnpagination" v-on:click="previous()">Précédent</button>
        <button class="btnpagination" v-on:click="nextPage()">Suivant</button>
      </div>
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
      connected:true,
      password:null,
      photo:null,
      search:"",
      adherents: [
        {id:""},
        {prenom:""},
        {pseudo:""},
        {dateadhesion:""}
      ],
      profils: [
        { photo:""},
        
      ],
      currentPage:1,
      perPage:10
      
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
      searchMembers() {
        let formParams = new URLSearchParams();
        formParams.append("search",this.search);
          const requestOptions = {
            method: "GET",
            credentials:'include'
          } 
          fetch('http://www.back.poney.local/searchmembers.php/?search='+this.search, requestOptions )
            .then(response => response.json())
            .then(data =>{this.adherents=data})
      },  
      previous(){     
        this.currentPage--
          fetch('http://www.back.poney.local/searchmembers.php/?page='+this.currentPage, {credentials:'include'})
            .then(response => response.json())
            .then(data =>{this.adherents=data})                  
      },
      nextPage(){
        this.currentPage++
          fetch('http://www.back.poney.local/searchmembers.php/?page='+this.currentPage, {credentials:'include'})
            .then(response => response.json())
            .then(data =>{this.adherents=data})
                 
      }
    }

}


</script>
<style>

  #membres {
    font-family: Tahoma;
    font-size: 18px;
    color: #222;
    background: linear-gradient(to right top, #65dfc9, #6cdbeb);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  h1{
    text-align: center;
    color: #426696;
    font-weight: 600;
    font-size: 3rem;
    opacity: 0.8;

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
  .pagination{
    display: flex;
    justify-content: center;
  }
  .btnpagination{
    margin-right: 10px;
    border: none;
    border-radius: 1px 1px 1px 1px;
    background-color: white;
    outline: none;
    cursor: pointer;
    color: #147871;
    font-size: 14px;
    padding: 5px;
    width: 90px;
  }

  @media screen and (max-width: 768px) { 
      #membres{
        display:block;
        height: 100vh;

      }
      .members{
        height: 100%;
      }
      .pagination{
        display: flex;
        justify-content: center;
  }
     

  }    
</style>
