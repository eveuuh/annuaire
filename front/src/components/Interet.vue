<template>

    <div id="interetCard">
      <div class="nameInterest">
        <p>{{checkedName}}</p> 
      </div>
      <div class="deleteInterest"  >
        <button class="trash"  >
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
          </svg>
        </button>
      </div>     

    </div>
  
</template>
<script >
// @ is an alias to /src

export default {
  name: 'Interet',
  props: {
    checkedName:"",
  } 
}  
</script>
<style scoped>



.nameInterest{
    display: inline-block;


}
#interetCard{
  display: block;
  width:140px;
  height:50px;
  padding:4px;
  background: linear-gradient(
    to left top,
    rgba(255, 255, 255, 0.8),
    rgba(255, 255, 255, 0.5)
  );
  border-radius: 1rem;
  margin: 0.5rem;
  box-shadow: 6px 6px 20px rgba(122, 122, 122, 0.212);
  justify-content: space-between;
}
 
p{
  font-family: "Poppins", sans-serif;
}

.trash{
  height:58px;
  background-color:rgb(255 55 55 / 97%);
  border:none;
  border-radius: 0rem 1rem 1rem 0rem;
  position:relative;
  top: -62px;
  right: -116px;
}

</style>