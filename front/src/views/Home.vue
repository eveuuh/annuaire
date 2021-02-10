<template>
  <section>
    <div class="mainform" :class="{'sign-up-active' : signUp}">
      
      <div class="overlay-container">
        <div class="overlay">
          <div class="overlay-left">
            <h2>Bon retour parmis nous!</h2>
            <p>Merci de vous identifiez</p>
              <img :src="image">
            <button class="invert" id="signIn" @click="signUp = !signUp">Se connecter</button>
          </div>
          <div class="overlay-right">
            <h2>Bienvenue</h2>
            <p>Merci de vous enregistrez pour continuer</p>
              <img :src="image">

            <button class="invert" id="signUp" @click="signUp = !signUp">S'enregistrer</button>
          </div>
        </div>
      </div>


    <form class="sign-up"  method="POST">
      <label for="nom">Nom</label>
        <input v-model="Nom" type="text" name="nom" id="nom" placeholder="Nom">
      <label for="prenom">Prenom</label>
        <input v-model="Prenom" type="text" name="prenom" id="prenom" placeholder="Prenom">  
      <label for="pseudo">Pseudo</label>
        <input v-model="pseudo" type="text" name="pseudo" id="pseudo" placeholder="Pseudo">
      <label for="email">Email</label>
        <input v-model="email" type="text" name="email" id="email" placeholder="Email">     
      <label for="number">Numero</label>
        <input v-model="Numero" type="integer" name="number" id="number" placeholder="Telephone">   
      <label for="addresse">Addresse</label>
        <input v-model="Addresse" type="text" name="addresse" id="addresse" placeholder="Adresse">
      <label for="codepostal">Code Postal</label>
        <input v-model="Codepostal" type="text" name="codepostal" id="codepostal" placeholder="Code postal">
      <label for="Ville">Ville</label>
        <input v-model="Ville" type="text" name="Ville" id="Ville" placeholder="Ville">
      <label for="NumberAdherent">Numero d'adhérent</label>
         <input v-model="NumberAdherent" type="text" name="NumberAdherent" id="NumberAdherent" placeholder="N° d'adhérent">   
      <label for="password">password</label>
          <input v-model="password" type="password" name="password" id="password" placeholder="Mot de passe">
       <label for="password2">password</label>
           <input v-model="password2" type="password" name="password2" id="password2" placeholder="Confirmez votre mot de passe">
        <label for="DateAdhesion">Date d'adhésion</label>
            <input v-model="DateAdhesion" type="datetime" name="DateAdhesion" id="DateAdhesion" placeholder="Date d'adhésion">
       <button v-on:click="register">S'enregistrer</button>
    </form>

    <form class="sign-in" action="">
        <h2>Connectez vous</h2>
        <label for="pseudo"> Votre pseudo</label>
        <input v-model="pseudo" Type="text" name="pseudo" id="pseudolog" placeholder="Pseudo">
        <br>
        <label for="password"> Votre Mot de passe</label>
        <input v-model="password" type="password" name="password" id="passwordlog" placeholder="Mot de passe">
        <br>
        <button v-on:click="submit">Se connecter</button>
    </form>

    </div>
  </section>
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



img {
  width:2OOpx;
  height:200px;
}
label{
  font-size: 12px;
}
.mainform {
    position: absolute;
    width: 768px;
    height: 600px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 15px 30px rgba(0, 0, 0, .2),
                0 10px 10px rgba(0, 0, 0, .2);
    margin-left: auto;
    margin-right: auto;
    margin-top: 745px;
}  
section{
  justify-content: center;
  align-items: center;
  display: flex;
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
  background: #2aa28f;
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
  font-family: "Poppins", sans-serif;
  color: #e4e4e4d0;

}
p {
  margin: 20px 0 30px;
  font-family: "Poppins", sans-serif;
  color: #e4e4e4d0;

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
  margin-top: 14px;

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
  background: linear-gradient(to right top, #65dfc9, #6cdbeb);
  transition: all .5s ease-in-out;
}    
input {
  background: 0;
  width: 250px;
  outline: 0;
  border: 0;
  border-bottom: 2px solid rgba(255,255,255, 0.3);
  margin: 8px 0;
  font-size: 18px;
  font-weight: bold;
  color: rgba(255,255,255, 0.8);
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
  label{
    display:none
  }
::placeholder{
  color:rgba(247, 247, 247, 0.89);
  font-family: "Poppins", sans-serif;
  font-size: 12px;
  font-weight: normal;
} 
</style>