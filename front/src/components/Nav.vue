<template>
  <div id="nav">
    <ul class="nav-links">
      <li> <router-link to="/">Poney Fringants</router-link> </li>
      <li> <router-link to="/about">About</router-link></li>
      <li> <router-link to="/membres">Membres</router-link></li>
      <li> <router-link to="/stats">Stats</router-link></li>      
    </ul> 
     <router-link to="/profile">Mon Profil</router-link>
   
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
}
}
</script>

<style lang="scss">
  a{
   text-decoration:none;
   color:white;
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
    font-size: 1.2rem;
    font-weight: 500;
    display: block;
  }
  li{
    color:red;
    text-decoration: none;
    list-style: none;
    display:flex;
    text-align: right;

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
</style>