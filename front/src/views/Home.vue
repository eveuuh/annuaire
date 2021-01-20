<template>
  <article>
    <div class="mainform" :class="{'sign-up-active' : signUp}">
      
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-left">
            <h2>Bon retour parmis nous!</h2>
            <p>Merci de vous identifiez</p>
              <img :src="image">
            <button class="invert" id="signIn" @click="signUp = !signUp">Sign In</button>
          </div>
          <div class="overlay-right">
            <h2>Bienvenue</h2>
            <p>Merci de vous enregistrez pour continuer</p>
              <img :src="image">

            <button class="invert" id="signUp" @click="signUp = !signUp">Sign Up</button>
          </div>
        </div>
      </div>


    <form class="sign-up"  method="POST">
            <label for="nom">Nom</label>
                <input v-model="Nom" type="text" name="nom" id="nom">
            <label for="prenom">Prenom</label>
                <input v-model="Prenom" type="text" name="prenom" id="prenom">  
            <label for="pseudo">Pseudo</label>
                <input v-model="pseudo" type="text" name="pseudo" id="pseudo">
            <label for="email">Email</label>
                <input v-model="email" type="text" name="email" id="email">     
            <label for="number">Numero</label>
                <input v-model="Numero" type="integer" name="number" id="number">   
            <label for="addresse">Addresse</label>
                <input v-model="Addresse" type="text" name="addresse" id="addresse">
           
            <label for="codepostal">Code Postal</label>
                <input v-model="Codepostal" type="text" name="codepostal" id="codepostal">
           
             <label for="Ville">Ville</label>
                <input v-model="Ville" type="text" name="Ville" id="Ville">
            
              <label for="NumberAdherent">Numero d'adhérent</label>
                <input v-model="NumberAdherent" type="text" name="NumberAdherent" id="NumberAdherent">   
             
             <label for="password">password</label>
                <input v-model="password" type="password" name="password" id="password">
            <label for="password2">password</label>
                <input v-model="password2" type="password" name="password2" id="password2">
            
             <label for="DateAdhesion">Date d'adhésion</label>
                <input v-model="DateAdhesion" type="datetime" name="DateAdhesion" id="DateAdhesion">

            <button v-on:click="register">S'enregistrer</button>
    </form>

    <form class="sign-in" action="">
        <h2>Connectez vous</h2>
        <label for="pseudo"> Votre pseudo</label>
        <input v-model="pseudo" Type="text" name="pseudo" id="pseudolog">
        <br>
        <label for="password"> Votre Mot de passe</label>
        <input v-model="password" type="text" name="password" id="passwordlog">
        <br>
        <button v-on:click="submit">Se connecter</button>
    </form>

    </div>
  </article>
</template>

<script>


// @ is an alias to /src
export default {
  data: () => {
    return {
      pseudo:null,
      password:null,
      signUp:false,
      Prenom :null,
      Nom :null,
      email :null,
      Numero : null,
      Addresse :null,
      Codepostal :null,
      Ville : null,
      NumberAdherent : null,
      password2 : null,
      DateAdhesion : null,
      image: require('@/assets/poney.png'),
      connected:false

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
      body: formParams, 
      credentials:'include'

    }
    fetch('http://www.back.poney.local/login.php', requestOptions)
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
    },
    register(ev) {
      ev.preventDefault();
      let formParams = new URLSearchParams();
      formParams.append("prenom",this.Prenom);
      formParams.append("nom",this.Nom);
      formParams.append("pseudo",this.pseudo);
      formParams.append("email",this.email);
      formParams.append("number",this.Numero);
      formParams.append("Addresse",this.Addresse);
      formParams.append("CodePostal",this.Codepostal);
      formParams.append("Ville",this.Ville);
      formParams.append("NumeroAdherent",this.NumberAdherent);
      formParams.append("password",this.password);
      formParams.append("password2",this.password2);
      formParams.append("DateAdhesion",this.DateAdhesion);

      const requestOptions = {
        method: "POST",
        headers: { 
          'Content-Type' : 'application/x-www-form-urlencoded'
        },
        body: formParams
      }
      fetch('http://www.back.poney.local/register.php', requestOptions)
        .then(response => response.json())
        .then(data =>(console.log(data)))
       // .then(this.$router.push({ name: 'Profile' }))

    }
  }

  
}
</script>

<style lang="scss" scoped>

* {
  font-family: 'Roboto', sans-serif;
  
}

img {
  width:2OOpx;
  height:200px;
}
label{
  font-size: 12px;
}
.mainform {
    position: relative;
    width: 768px;
    height: 600px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 15px 30px rgba(0, 0, 0, .2),
                0 10px 10px rgba(0, 0, 0, .2);
    background: linear-gradient(to bottom, #efefef, #ccc);
    margin-left: auto;
    margin-right: auto;
    
}  
.overlay-container {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform .5s ease-in-out;
      z-index: 100;
}
.overlay {
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      background: #41a390;
      color: #fff;
      transform: translateX(0);
      transition: transform .5s ease-in-out;
    }
    @mixin overlays($property) {
      position: absolute;
      top: 0;
      display: flex;
      align-items: center;
      justify-content: space-around;
      flex-direction: column;
      padding: 70px 40px;
      width: calc(50% - 80px);
      height: calc(100% - 140px);
      text-align: center;
      transform: translateX($property);
      transition: transform .5s ease-in-out;
    }
    .overlay-left {
      @include overlays(-20%);
    }
    .overlay-right {
      @include overlays(0);
      right: 0;
    }
  
h2 {
  margin-top: 10px;
  font-family: 'Roboto', sans-serif;
}
p {
  margin: 20px 0 30px;
  font-family: 'Roboto', sans-serif;
}
a {
  color: #222;
  text-decoration: none;
  margin: 15px 0;
  font-size: 1rem;
}
button {
  border-radius: 20px;
  border: 1px solid #00A28F;
  background-color: #00A28F;
  color: #fff;
  font-size: 1rem;
  font-weight: bold;
  padding: 10px 40px;
  letter-spacing: 1px;
  text-transform: uppercase;
  cursor: pointer;
  transition: transform .1s ease-in;
    &:active {
      transform: scale(.9);
    }
    &:focus {
      outline: none;
    }
}
button.invert {
  background-color: transparent;
  border-color: #fff;
}
form {
    position: absolute;
    top: 0;
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-direction: column;
    padding: 90px 60px;
    width: calc(50% - 120px);
    height: calc(100% - 180px);
    text-align: center;
    background: linear-gradient(to bottom, #1a725a, #327b83);  
      transition: all .5s ease-in-out;
    div {
      font-size: 1rem;
}
    input {
      background-color: #eee;
      border: none;
      padding: 8px 15px;
      margin: 6px 0;
      width: calc(100% - 30px);
      border-radius: 15px;
      border-bottom: 1px solid #ddd;
      box-shadow: inset 0 1px 2px rgba(0, 0, 0, .4), 
                        0 -1px 1px #fff, 
                        0 1px 0 #fff;
      overflow: hidden;
      &:focus {
        outline: none;
        background-color: #fff;
      }
    }
  }
  .sign-in {
    left: 0;
    z-index: 2;
  }
  .sign-up {
    left: 0;
    z-index: 1;
    opacity: 0;
  }
  .sign-up-active {
    .sign-in {
      transform: translateX(100%);
    }
    .sign-up {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show .5s;
    }
    .overlay-container {
      transform: translateX(-100%);
    }
    .overlay {
      transform: translateX(50%);
    }
    .overlay-left {
      transform: translateX(0);
    }
    .overlay-right {
      transform: translateX(20%);
    }
  }
  @keyframes show {
    0% {
      opacity: 0;
      z-index: 1;
    }
    49% {
      opacity: 0;
      z-index: 1;
    }
    50% {
      opacity: 1;
      z-index: 10;
    }
  }
</style>