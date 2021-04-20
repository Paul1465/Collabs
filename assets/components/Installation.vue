<template>
  <div>
  <h2>Mes infos</h2>
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
          this.$fire({
          title: "Succès",
          text: "Vos informations ont été mis à jour.",
          type: "success",
          timer: 3000
        })
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
