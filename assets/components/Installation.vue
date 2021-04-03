<template>
  <div>
  <h2>Mes infos</h2>
  <div id="post-form-holder" ref="form" v-on:submit.prevent="onSubmit"></div>
  </div>
</template>

<script> 
   import axios from 'axios'
   export default {
     methods: {
       onSubmit: function (e){
         console.log(e.target);
         let formData = new FormData(e.target)
         axios.post('/dashboard/storePost', formData)
         .then((response) => {
           console.log(response)
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
