<template>

<form action="">
    <label for="userlogin"> Votre pseudo</label>
    <input v-model="userlogin" Type="text" name="userlogin" id="userlogin">
    <br>
    <label for="userpassword"> Votre Mot de passe</label>
    <input v-model="userpassword" type="text" name="userpassword" id="userpassword">
    <br>
    <button v-on:click="submit">Se connecter</button>
</form>
</template>

<script>
export default {
  data: () => {
    return {
      userlogin:null,
      userpassword:null
    }  
  },
  methods: {
    submit(ev) {
      ev.preventDefault();
    let formParams = new URLSearchParams();
    formParams.append("userlogin",this.userlogin);
    formParams.append("userpassword",this.userpassword);

    const requestOptions = {
      method: "POST",
      headers: { 
        'Content-Type' : 'application/x-www-form-urlencoded'
      },
      body: formParams
    }
    fetch('http://www.poneyback.local/login.php', requestOptions)
      .then(response => response.json())
      .then(data =>(alert(data)));
    }  
  }
};
</script>
