<template>
  <div class="about">
    <Nav></Nav>
    <h1>Votre Profil</h1>
     <p>
        <button @click="disconnect">Se déconnecter</button>
    </p>
    <Avatar >  {{pseudo}}</Avatar>
    
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
      password:null
    }
  }, 
    mounted: function () {
        fetch('http://www.poneyback.localhost/connected.php', {credentials:'include'})

            .then(response => response.json())
            .then((data) => {this.connected = data.connected; this.pseudo = data.pseudo});
      },   

  methods:{
    disconnect(ev) {
            ev.preventDefault(); 
            fetch('http://www.poneyback.localhost/disconnect.php', {credentials:'include'})     
            .then(this.$router.push({ name: 'Home' }))
            this.pseudo = null; 
            this.password = null; 
            this.connected = false; 

  }
}            
};         

</script>