<template>
    <div class="card">
        <h2>{{pseudo}}</h2>
        <h3>{{prenom}}</h3>
        <p>{{dateadhesion}}</p>
        <Avatar class= "pp" :pseudo="pseudo" :img="img" ></Avatar>
        
    </div>   
</template>


<script>
import Avatar from '@/components/Avatar.vue'

export default {
  name: 'Member',
  components : {
    Avatar,
  },
  props: {
    pseudo: { type: String, default: 'Pseudo'},
    prenom: { type: String, default: 'Prenom'},
    dateadhesion: { type: String, default: ''},
    img: {type: String, default:null}

  }
}  
</script>   

<style scoped>

.card{
    position:relative;
    width:300px;
    height:100px;
    display:inline-block;
    margin:20px;
    text-align:left;
    background: white;
    background: linear-gradient(
        to right bottom,
        rgba(255, 255, 255, 0.7),
        rgba(255, 255, 255, 0.3)
    );
    border-radius: 1rem;
    z-index: 2;
    backdrop-filter: blur(2rem);
    
}
 
.card > * {
    position :absolute;
    font-family: Tahoma
}

h2{
    top:8px;
    left:85px;
    height:8px;
    font-family: Tahoma
}

h3{
    top:40px;
    left:85px;
    height:8px;
    width:calc(100%- 98px);
    font-size:0.8em;
    color: black;
    font-family: Tahoma

}

p{
    top:55px;
    left:85px;
    height:8px;
    width:calc(100%- 98px);
    font-size:0.8em;
    color: black
}
.pp{
    top:15px;
    left:8px;
    height:8px;
    width:8px
}


.card:hover {
   background-color:#a1ccc3;
}



</style>
