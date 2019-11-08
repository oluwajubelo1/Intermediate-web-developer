<script>
import generalnav from '@/Shared/header'
export default {
  props:['card'],
  data(){
    return{
      sending:false,
      form:{
        number:null,
        expire:null,
        brand:null,
      }
    }
  },
  computed:{
    pageTitle(){
      return this.card.created_at?'Edit Card':'Add New Card';
    },
    status(){
      if (this.card.deleted_at){
        return 'trashed';
      }
      return 'not trashed';
    }
  },
  components:{
      generalnav
    },
    methods: {
      submit(){
          this.sending=true;
        this.$inertia.post(this.route('customer.store'),this.form).then(()=>this.sending=false)
      }
    },
}
</script>
<template>
  <div>
    <generalnav></generalnav>
     <form @submit.prevent="submit">
       <div>
         <label>Card Number</label>
         <input type="text" :errors="$page.errors.number" class="pr-6 pb-8 w-full lg:w1/2" v-model="form.number">
       </div>

       <div>
         <label>Expire</label>
         <input type="date" :errors="$page.errors.expire" class="pr-6 pb-8 w-full lg:w1/2" v-model="form.expire">
       </div>

       <div>
         <label>Brand</label>
         <input type="text" :errors="$page.errors.brand" class="pr-6 pb-8 w-full lg:w1/2" v-model="form.brand">
       </div>

        <div class="px-8 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-end items-center">
          <button :loading="sending" class="btn-indigo" type="submit">Create Organization</button>
        </div>
      </form>
  </div>
</template>
