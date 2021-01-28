<template>
    <div class="card">
        <h2>{{pseudo}}</h2>
        <h3>{{prenom}}</h3>
        <p>{{DateAdhesion}}</p>
        <Avatar class= "pp" :pseudo="pseudo">{{photo}}</Avatar>
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
    DateAdhesion: { type: String, default: 'undefined'},


  }
}  
</script>   

<style scoped>

.card{
    position:relative;
    box-shadow: 5px 0 25px rgb(112, 105, 105);
    background-color:white ;
    width:300px;
    height:100px;
    display:inline-block;
    margin:20px;
    text-align:left;
}
 
.card > * {
    position :absolute
}

h2{
    top:8px;
    left:85px;
    height:8px;
    width:8px
}

h3{
    top:40px;
    left:85px;
    height:8px;
    width:calc(100%- 98px);
    font-size:0.8em;
    color: black
}

p{
    top:50px;
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

</style>
