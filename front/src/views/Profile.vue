<template>

  <section>
    <Nav class="test"></Nav>
    <div class="main">
      <div class="profilecard">
        <div class="info">
          <h1>Bienvenue {{pseudo}}</h1>
          <Avatar :pseudo="pseudo" :img="photo" >{{img}}</Avatar>      
            <input type="file" id="photo" ref="photo" name="photo" v-on:change="handleFileUpload()"/>
            <button v-on:click="submitFile()">Envoyer</button>
        </div>     
        <div class="vue">      
          <h2> Mes interets</h2>
            <button @click="toggleDropdown" class="dropbtnInterest">Choisir un centre d'interêt</button> 
              <div v-if="display" class="Dropdown-ItemList">
                <ul class="interets">   
                    <li  class="Dropdown-Item" type="checkbox"  v-for="(interest,id) in interests" :key="id"> 
                      <input type="checkbox" label="" v-bind:value="interest" v-model="checkedNames">{{interest.nom}}
                    </li>            
                </ul>    
              </div>
              <button class="sbinteret" v-on:click="submitInterest()">Enregistrer</button>
        </div>    
        <div class="viewinterest">
        <Interet 
        v-for="(checkedName,id) in checkedNames" 
        :key="id" 
        :checkedName="checkedName.nom"
         >
        {{checkedName}} 
        </Interet>
     
    </div>

      </div>
      <div class="circle1"></div>
    <div class="circle2"></div>
    </div>
  </section>
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
      interests:[],
      checkedNames:[],
      getMembersInterest:""
      
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
       .then(data =>{this.interests=data});

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
            .then((data) => {this.photo = data.photo});
    },
    submitInterest(){
        let formParams= new URLSearchParams();
        let test= JSON.stringify(this.checkedNames);
        let resultTest =JSON.parse(test);
        //let item = this.test.find((item) => item.InteretId == InteretId);
        //console.log(resultTest[0].InteretId);
       // console.log(resultTest);
        formParams.append("resultTest",resultTest[0].InteretId);
        formParams.append("id",1);
          const requestOptions = {
            method: "POST",
            body: formParams, 
            credentials:'include',
             
        } 
        fetch('http://www.back.poney.local/memberInterest.php',requestOptions)     
            .then(response => response.json())
            .then((data) => {this.resultTest= data})
          
    }, // fetch un object json avec collection des interets
    //result test = 1 enregistrement, si plusieurs cases cochées, 
    handleFileUpload(){
      this.photo = this.$refs.photo.files[0];
    },       
    toggleDropdown() { //
    this.display = !this.display
    } 
  }
};         

</script>

<style >

.test{
  z-index:99
}
body {
  font-family: "Poppins", sans-serif;
  min-height: 100vh;
  background: linear-gradient(to right top, #65dfc9, #6cdbeb);
  display: flex;
  align-items: center;
  justify-content: center;
}
h1 {
  color: #426696;
  font-weight: 600;
  font-size: 3rem;
  opacity: 0.8;
}
h2,
p {
  color: #658ec6;
  font-weight: 500;
  opacity: 0.8;
}
h3 {
  color: #426696;
  font-weight: 600;
  opacity: 0.8;
}
.main {
  font-family: "Poppins", sans-serif;
  min-height: 100vh;
  background: linear-gradient(to right top, #65dfc9, #6cdbeb);
  display: flex;
  align-items: center;
  justify-content: center;
}
.profilecard{
  min-height: 80vh;
  background: linear-gradient(
    to right bottom,
   rgb(251 251 251 / 48%),
    rgb(212 205 205 / 30%)
  );
  border-radius: 2rem;
  z-index: 2;
  backdrop-filter: blur(2rem);
  display: flex;
  margin-top:100px
}
.info{
  flex: 1;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-evenly;
  text-align: center;
  background: linear-gradient(
    to right bottom,
    rgba(255, 255, 255, 0.7),
    rgba(255, 255, 255, 0.3)
  );
  border-radius: 2rem;
}
.avatar{
  margin-left:22px;
}
.viewinterest{
  margin: 1.5rem;
  display: flex;
  flex-direction: column;
  flex: 2;
  border-radius: 2rem;
  color: white;
  padding: 1rem;
  position: relative;
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
  background:linear-gradient( to right bottom, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.3) ) ; 
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
.circle1,
.circle2 {
  background: white;
  background: linear-gradient(
    to right bottom,
    rgba(255, 255, 255, 0.8),
    rgba(255, 255, 255, 0.3)
  );
  height: 10rem;
  width: 10rem;
  position: absolute;
  border-radius: 50%;
}
.circle1 {
  top: 12%;
  right: 27%;
}
.circle2 {
  bottom: -1%;
  left: 25%;
}
ul.interets{
  width: 173%;
  padding: 5px 10px;
  margin-top: -5px;
  border-radius: 3px;
  list-style: none;
  margin-left:-47px
}
ul >li{
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
.dropbtnInterest {
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
  display: flex;
  background: linear-gradient(
    to left top,
    rgba(255, 255, 255, 0.8),
    rgba(255, 255, 255, 0.5)
  );
  border-radius: 1rem;
  margin: 2rem 0rem;
  padding: 2rem;
  box-shadow: 6px 6px 20px rgba(122, 122, 122, 0.212);
  justify-content: space-between;
}
.sbinteret {
  border:none;
  margin-left: 19px;
  margin-top: 17px;

}    
.vue {
  display:flex;
  flex-direction: column;
  align-items: center;
  padding:10px
}

#photo{
  margin-left: 21px;
}

  @media screen and (max-width: 768px) { 
    .profilecard{
      display:flex;
      flex-direction: column;
    }
  }
</style>


