<template>
  <div>






  
  <h2 class="mb-3">Mes infos</h2>

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  Vos informations ont été mis à jour
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

  <div id="post-form-holder" ref="form" v-on:submit.prevent="onSubmit"></div>
  </div>
</template>

<script> 
   import axios from 'axios'
   export default {
     data(){
       return {
         formValid: false,
       }
     },
     methods: {
       onSubmit: function (e){
         console.log(e.target);
         let formData = new FormData(e.target)
         axios.post('/dashboard/storePost', formData)
         .then((response) => {
           console.log(response)
           this.formValid = true;
         })
       }
     },
     async mounted () {
       let {data} = await axios.get('/dashboard/postform')
       console.log(data)
       this.$refs.form.innerHTML = data.form
      
     }
   }
</script>
