<template>
  <div class="container">
  
  </div>
  
</template>
<script>

export default {

  name: 'Logout',
  data: () => {
    return {
      connected:true,
      pseudo:"toto", 
      password:null
    }
  }, 
  mounted: function () {
        fetch('http://www.back.poney.local/connected.php', {credentials:'include'})

            .then(response => response.json())
            .then((data) => {this.connected = data.connected; this.pseudo = data.pseudo});
      },   
  methods:{
    disconnect(ev) {
            ev.preventDefault(); 
            fetch('http://www.back.poney.local/disconnect.php', {credentials:'include'})     
            .then(this.$router.push({ name: 'Home' }))
            this.pseudo = null; 
            this.password = null; 
            this.connected = false; 

  }
}            
};         
</script>
