<template>
  <div class="content">
    <Nav></Nav>
    <div class="profilecard">
      <h1>Bienvenue {{pseudo}} </h1>
      <Avatar :pseudo="pseudo">{{photo}}</Avatar>
        <input type="file" id="photo" ref="photo" name="photo" v-on:change="handleFileUpload()"/>
        <button v-on:click="submitFile()">Envoyer</button>
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
      photo:null,
      
    }
  }, 
    mounted: function () {
      fetch('http://www.back.poney.local/connected.php', {credentials:'include'})
            .then(response => response.json())
            .then((data) => {this.connected = data.connected; this.pseudo = data.pseudo; this.photo=data.photo});
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
        console.log(formParams);

        const requestOptions = {
          method: "POST",
          body: formParams, 
          credentials:'include'
        } 
        fetch('http://www.back.poney.local/upload.php',requestOptions)     
            .then(response => response.json())
            .then((data) => {this.photo = data.photo});
    },
    handleFileUpload(){
      this.photo = this.$refs.photo.files[0];
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
  margin-left:22px;
  margin-top:110px;
}


.profilecard{
  border:1px solid white;
  height:100vh;
  width: 800px;
  margin-left:auto;
  margin-right:auto;  
}

.avatar{
  margin-left:22px;
}

</style>


