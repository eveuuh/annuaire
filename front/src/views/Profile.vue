<template>

  <div class="content">
    <Nav></Nav>
    <div class="profilecard">
      <div class="info">
        <h1>Bienvenue {{pseudo}}</h1>
        <Avatar :pseudo="pseudo" :img="photo" >{{img}}</Avatar>      
          <input type="file" id="photo" ref="photo" name="photo" v-on:change="handleFileUpload()"/>
          <button v-on:click="submitFile()">Envoyer</button>
      </div> 
     
      
        <div id="Vue">      
          <h2> Mes interets</h2>
          <button @click="toggleDropdown" class="dropbtn">Choisir un centre d'interêt</button>
            <div v-if="display" class="Dropdown-ItemList">
              <ul class="interets">
                <li class="Dropdown-Item">
                  <input type="checkbox" id="Sport" value="Sport" v-model="checkedNames">      
                  <label for="Sport">Sport</label>
                </li>
                <li class="Dropdown-Item">
                  <input type="checkbox" id="Musique" value="Musique" v-model="checkedNames"> 
                  <label for="Musique">Musique</label>
                </li>
                <li class="Dropdown-Item">                      
                  <input type="checkbox" id="Jeux vidéos" value="Jeux vidéos" v-model="checkedNames"> 
                  <label for="Jeux vidéos">Jeux vidéos</label>
                </li>
                <li class="Dropdown-Item">                      
                  <input type="checkbox" id="Lecture" value="Lecture" v-model="checkedNames">
                  <label for="Lecture">Lecture</label>
                </li> 
                <li class="Dropdown-Item">                      
                    <input type="checkbox" id="Informatique" value="Informatique" v-model="checkedNames">
                    <label for="Informatique">Informatique</label>
                </li>    
                 <li class="Dropdown-Item">   
                    <input type="checkbox" id="Sorties" value="Sorties" v-model="checkedNames">
                    <label for="Sorties">Sorties</label>
                </li>     
                <li class="Dropdown-Item">       
                    <input type="checkbox" id="Cuisine" value="Cuisine" v-model="checkedNames">
                    <label for="Cuisine">Cuisine</label>
                </li>     
                <li class="Dropdown-Item">   
                    <input type="checkbox" id="Aviation" value="Aviation" v-model="checkedNames">
                    <label for="Aviation">Aviation</label>
                </li>     
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Mécanique" value="Mécanique" v-model="checkedNames">
                    <label for="Mécaniques">Mécanique</label>
                </li>     
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Licornes" value="Licornes" v-model="checkedNames">
                    <label for="Licornes">Licornes</label>
                </li>     
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Joaillerie" value="Joaillerie" v-model="checkedNames">
                    <label for="Joaillerie">Joaillerie</label>
                 </li>      
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Agriculture" value="Agriculture" v-model="checkedNames">
                    <label for="Agriculture">Agriculture</label>
                 </li>    
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Cinéma" value="Cinéma" v-model="checkedNames">
                    <label for="Cinéma">Cinéma</label>
                </li>     
                  <li class="Dropdown-Item">      
                    <input type="checkbox" id="Politique" value="Politique" v-model="checkedNames">
                    <label for="Politique">Politique</label>
                  </li>   
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Couture" value="Couture" v-model="checkedNames">
                    <label for="Couture">Couture</label>
                 </li>    
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Animaux" value="Animaux" v-model="checkedNames">
                    <label for="Animaux">Animaux</label>
                 </li>    
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Sciences" value="Sciences" v-model="checkedNames">
                    <label for="Sciences">Sciences</label>
                 </li>    
                 <li class="Dropdown-Item">       
                  <input type="checkbox" id="Histoire" value="Histoire" v-model="checkedNames">
                    <label for="Histoire">Histoire</label>
                 </li>    
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="SVT" value="SVT" v-model="checkedNames">
                    <label for="SVT">SVT</label>
                 </li>    
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Physique-Chimie" value="Physique-Chimie" v-model="checkedNames">
                    <label for="Physique-Chimie">Physique-Chimie</label>
                 </li>    
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Taxidermie" value="Taxidermie" v-model="checkedNames">
                    <label for="Taxidermie">Taxidermie</label>
                 </li>    
                 <li class="Dropdown-Item">       
                    <input type="checkbox" id="Philatélie" value="Philatélie" v-model="checkedNames">
                    <label for="Philatélie">Philatélie</label>
                 </li>    
               </ul>     
            </div>
          </div>
      </div>
    </div>
</template>

<script>
import Avatar from '@/components/Avatar.vue'
import Nav from '@/components/Nav.vue'



export default {
  name: 'Profile',
  components : {
    Avatar,
    Nav

  },
  
  data: () => {
    return {
      connected:true,
      pseudo:"toto", 
      password:null,
      id:"",
      photo:"",
      adherents: [
        {id:""},
        {prenom:""},
        {pseudo:""}
      ],
      display: false

      
    }
  }, 
  mounted: function () {
      fetch('http://www.back.poney.local/connected.php', {credentials:'include'})
            .then(response => response.json())
            .then((data) => {
            this.connected = data.connected;
            this.pseudo = data.pseudo;
            this.photo= data.photo;
            console.log("test",JSON.parse(JSON.stringify(data)));
            this.id=data.id
            }
          );
      },   
      
  methods:{
    disconnect(ev) {
      ev.preventDefault(); 
      fetch('http://www.back.poney.local/disconnect.php', {credentials:'include'})     
      .then(this.$router.push({ name: 'Home' }))
      this.pseudo = null; 
      this.password = null; 
      this.connected = false; 

    },
    submitFile(){
      //ev.preventDefault();
      const files = this.$refs.photo.files[0];
        let formParams = new FormData();
        formParams.append("photo",files);
        formParams.append("id",1);


        const requestOptions = {
          method: "POST",
          body: formParams, 
          credentials:'include'
        } 
        fetch('http://www.back.poney.local/upload.php',requestOptions)     
            .then(response => response.json())
            .then((data) => { console.log("test2",data);this.photo = data.photo});
    },
    handleFileUpload(){
      this.photo = this.$refs.photo.files[0];
    },       
    toggleDropdown() {
    this.display = !this.display
    }   
  }
};         

</script>

<style scoped>
body {
  height:100vh;
  margin-top:10px;
  background: linear-gradient(to bottom, #1a725a, #327b83);  
}

h1 {
  color:white;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
h2{
  color:white;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.profilecard{
  height:100%;
  width: 800px;
  margin-left:auto;
  margin-right:auto;  
  background: linear-gradient(to bottom, #1a725a, #327b83);  
  margin-top:111px;
  box-shadow: 0 15px 30px rgba(0, 0, 0, .2),
                0 10px 10px rgba(0, 0, 0, .2);
  padding:30px;
  display:flex;
  justify-content:space-between        
}

.avatar{
  margin-left:22px;
}

.Dropdown-Title {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: rgb(180, 177, 176);
  padding: 5px 10px;
  border-radius: 5px;
  width: 150px;
  text-align: center;
  cursor: pointer;
  color:white
}
.Dropdown-ItemList {
  display: flex;
  flex-direction: column;
  width: 100px;
  
}
.Dropdown-Item {
  background-color: rgb(189, 189, 189);
  padding: 5px 10px;
  margin-top: 1px;
  border-radius: 3px;
  list-style:none;
  background-color: #f1f1f1;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);    
  font-family: 'Montserrat', sans-serif;

  
}
.Dropdown-ItemList--closed {
  display: none;
}
.Dropdown-Item:hover {
  background-color: rgb(161, 204, 195)
}


ul.interets{
  width: 189%;
  padding: 5px 10px;
  margin-top: -5px;
  border-radius: 3px;
  list-style: none;
  margin-left:-8px
  
}


ul >li{

  background-color: darkcyan;
  padding: 5px 10px;
  margin-top: 1px;
  border-radius: 3px;
  list-style: none;
  text-decoration: none;
  color: #3f3e3c;
  font-size: 14px;
  font-weight: 500;
  display: block;
  
}

.dropbtn {
  background-color: #4da596de;
  border-radius:10px;
  color: white;
  padding: 10px;
  font-size: 14px;
  font-weight: bold;
  box-shadow:1px 1px rgb(143, 136, 136);
  border: none;
  cursor: pointer;
  outline:none;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #0bc08a;
}

    
    

</style>


