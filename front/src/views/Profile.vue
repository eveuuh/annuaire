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
                  <li  class="Dropdown-Item" type="checkbox"  v-for="interest in interests"> 
                    <input type="checkbox" id="Philatélie" value="Philatélie" v-model="checkedNames">{{interest.nom}}
                  </li>            
             </ul>     
            </div>
          </div>
        <div class="interestDisplayed">
          <Interet></Interet>
          <Interet></Interet>
          <Interet></Interet>
          <Interet></Interet>
        </div>
      </div>
    </div>
</template>

<script>
import Avatar from '@/components/Avatar.vue'
import Nav from '@/components/Nav.vue'
import Interet from '../components/Interet.vue'



export default {
  name: 'Profile',
  components : {
    Avatar,
    Nav,
    Interet

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
      display: false,
      interests:[]
      

      
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
      fetch('http://www.back.poney.local/interests.php', {credentials:'include'})
       .then(response => response.json())
       .then(data =>{console.log(data),this.interests=data})
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
  width: 173%;
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

.interestDisplayed {
  display:flex;
  flex-direction: column;
  top:-95px;
  height:100%;
  position:relative
}
    
</style>


//recup l'element selectionné
//le mettre dans component Interet
// l'insert dans la BDD 
