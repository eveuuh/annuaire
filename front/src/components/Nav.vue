<template>
  <div id="nav">
    <ul class="nav-links">
      <li> <router-link to="/">Poney Fringants</router-link> </li>
      <li> <router-link to="/about">About</router-link></li>
      <li> <router-link to="/membres">Membres</router-link></li>
      <li> <router-link to="/stats">Stats</router-link></li>   
      <li class="dp" > <router-link to="/profile">Profil</router-link></li>
      <li class="dp" > <router-link to="/logout">Se Deconnecter</router-link></li>  
    </ul> 
    <div class="dropdown">
      <button v-on:click="myFunction()" class="dropbtn">Mon espace</button>
        <div id="myDropdown" class="dropdown-content">
          <router-link to="/profile">Mon Profil</router-link>
          <router-link to="/logout">Se Deconnecter</router-link>
         </div>
    </div>
   
    <div v-on:click="openMobileNav()" id="burger">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
  </div>
  
</template>

<script>

export default {
  name: 'Nav',
  methods: {
    openMobileNav() {
      const burger = document.getElementById('burger')
      const nav = document.querySelector('.nav-links')
      const navLinks = document.querySelectorAll('.nav-links li')
      // Toggle navigation on mobile
      nav.classList.toggle('nav-active')
      // Burger toggler
      burger.classList.toggle('toggle')
      // Animate navigation links
      navLinks.forEach((link, index) => {
        if (link.style.animation || link.style.webkitAnimation) {
          link.style.animation = ''
          link.style.webkitAnimation = ''
        } else {
          link.style.webkitAnimation = `navLinkFade 0.5s ease forwards ${
            index / 7
          }s`
          link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7}s`
        }
      })
    },
    myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            let dropdowns = document.getElementsByClassName("dropdown-content");
            let i;
            for (i = 0; i < dropdowns.length; i++) {
              let openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
        }
      }
      }
    },
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

<style lang="scss">
  a { 
   text-decoration:none;
   color:white;
  }

  .dp {
    display:none;
  }
  #nav {  
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color:#31857e;
    font-family: 'Montserrat', sans-serif;
    position: fixed;
    width: 100%;
    top: 0;
    left: 0;
  }
  ul.nav-links {
    display: flex;
    justify-content: space-between;
    width: 40%;
    line-height: 75px;
    text-decoration: none;
    list-style: none;
  }
  ul.nav-links li {
    list-style: none;
  }
  ul.nav-links a {
    text-decoration: none;
    color: #fefefe;
    font-size: 14px;
    font-weight: 500;
    display: block;
  }
  
  #burger {
    display: none;
    cursor: pointer;
  }
  #burger div {
    width: 30px;
    height: 3px;
    margin: 8px;
    background-color: #fefefe;
    transition: all 0.3s ease-in;
  }

  ul.dropdown-menu li:first-child {
    margin: 0 0 10px 0;
  }
  ul.dropdown-menu li {
    margin: 10px 0;
  }
  ul.dropdown-menu li:last-child {
    margin: 10px 0 0 0;
  }
  ul.dropdown-menu a {
    line-height: 8vh;
    padding: 5px 15px;
    background-color: #7c3434;
    line-height: 50px;
  }

  @media screen and (max-width: 768px) {
    ul.nav-links {
      position: absolute;
      flex-direction: column;
      width: 100%;
      height: 92vh;
      top: 8vh;
      right: 0;
      padding: 100px;
      align-items: center;
      justify-content: flex-start;
      background-color: #239985;
      opacity: 0.8;
      transform: translateX(100%);
      transition: transform 0.5s ease-in;
    }
    ul.nav-links li {
      opacity: 0;
    }
    ul.nav-links a {
      width: 100%;
    }
    div#burger {
      display: block;
    }
    ul.dropdown-menu {
      position: relative;
      top: 0;
    }
    .dropbtn{
      display:none;
    }
    .dp {
      display:flex;
    }
  }
  .nav-active {
    transform: translateX(0) !important;
  }
  @keyframes navLinkFade {
    from {
      opacity: 0;
      transform: translateX(-60px);
    }
    to {
      opacity: 1;
      transform: translateX(0px);
    }
  }
  .toggle .line1 {
    transform: rotate(-45deg) translate(-9px, 10px);
  }
  .toggle .line2 {
    opacity: 0;
  }
  .toggle .line3 {
    transform: rotate(45deg) translate(-5px, -6px);
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
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #0bc08a;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}
.dropdown-content .button-close{
   display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.button-close{
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}  
/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: rgb(161, 204, 195)}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}  
</style>