<script>
import generalnav from '@/Shared/header'
import TextInput from '@/Shared/TextInput'
import TextDate from '@/Shared/TextDate'
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
      generalnav,
      TextInput,
      TextDate
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
       <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
        <text-input v-model="form.number" :errors="$page.errors.number" class="pr-6 pb-8 w-full lg:w-1/2" label="Card Number" />


        <text-date v-model="form.expire" :errors="$page.errors.expire" class="pr-6 pb-8 w-full lg:w-1/2" label="Expire" />


        <text-input v-model="form.brand" :errors="$page.errors.brand" class="pr-6 pb-8 w-full lg:w-1/2" label="Brand" />

       </div>
        <div class="px-8 py-4 bg-grey-lightest border-t border-grey-lighter flex justify-end items-center">
          <button :loading="sending" class="btn-indigo" type="submit">Create Organization</button>
        </div>
      </form>
  </div>
</template>
