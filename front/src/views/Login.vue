<template>

<form action="">
    <label for="pseudo"> Votre pseudo</label>
    <input v-model="pseudo" Type="text" name="pseudo" id="pseudo">
    <br>
    <label for="password"> Votre Mot de passe</label>
    <input v-model="password" type="text" name="password" id="password">
    <br>
    <button v-on:click="submit">Se connecter</button>
</form>
</template>

<script>
export default {
  data: () => {
    return {
      pseudo:null,
      password:null
    }  
  },
  methods: {
    submit(ev) {
      ev.preventDefault();
    let formParams = new URLSearchParams();
    formParams.append("pseudo",this.pseudo);
    formParams.append("password",this.password);

    const requestOptions = {
      method: "POST",
      headers: { 
        'Content-Type' : 'application/x-www-form-urlencoded'
      },
      body: formParams
    }
    fetch('http://www.poneyback.local/login.php', requestOptions)
      .then(response => response.json())
      .then(data =>(alert(data)))
      .then(this.$router.push({ name: 'Profile' }))

      /*.then(response =>  {
        if(response.data.error){
          console.log("Error",response.data);

        }else {
          console.log("Success",response.data);
          this.$router.push("/profile");
        }
      })
      .catch(err=>{
        console.log("Error",err);
      })*/
    }
  }
};
</script>
