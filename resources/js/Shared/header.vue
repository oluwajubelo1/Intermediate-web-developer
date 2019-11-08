<script>
import Flash  from '@/Shared/Flash'
export default {

  components:{
    Flash,
  },
  methods: {


  },
}
</script>
<template>
  <div>
        <div class="flex flex-grow overflow-hidden">
          <!-- <main-menu :url="url()" class="bg-indigo-darker flex-no-shrink w-56 p-12 hidden md:block overflow-y-auto" /> -->
          <div class="w-full overflow-hidden px-4 py-8 md:p-12 overflow-y-auto" scroll-region>
            <flash />
            <slot />
          </div>
        </div>
          <div class="mt-1" placement="bottom-end">
              <div class="flex items-center cursor-pointer select-none group">
                <div class="text-grey-darkest group-hover:text-indigo-dark focus:text-indigo-dark mr-1 whitespace-no-wrap">
                  <span>{{ $page.auth.user.firstname }}</span>
                  <span class="hidden md:inline">{{ $page.auth.user.lastname }}</span>
                </div>

              </div>
              <div  class="mt-2 py-2 shadow-lg bg-white rounded text-sm">

                <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('customer.create')" v-if="$page.auth.user.role==='customer'">Add Credit Card</inertia-link>
                <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('logout')" method="post">Logout</inertia-link>
              </div>
          </div>
  </div>
</template>
