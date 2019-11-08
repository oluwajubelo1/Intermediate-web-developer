<script>
export default {
  metaInfo:{title:'Login'},
  props:{
      errors:Object,
  },
  data(){
    return{
      sending:false,
      form:{
        email:null,
        password:null
      }
    }
  },
  methods: {
      submit(){
        this.sending=true;
          this.$inertia.post('/login',this.form).then(()=>this.sending=false)
      }
  },
};
</script>

<template>
  <div>
    <form @submit.prevent="submit">
        <div>
          <label>Email</label>
          <input type="email" name="email" placeholder="ige@gmail.com" v-model="form.email" :errors="$page.errors.email" autofocus>
        </div>

        <div>
          <label>Password</label>
          <input type="password" name="email" placeholder="******" v-model="form.password" :errors="$page.errors.password" >
        </div>

        <div>
          <button :loading="sending" type="submit">Log In</button>
        </div>
    </form>
  </div>
</template>
