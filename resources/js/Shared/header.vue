<template>
   <!-- <div class="bg-white border-b w-full p-4 md:py-0 md:px-12 text-sm md:text-base flex justify-between items-center"> -->
            <div class="mt-1" placement="bottom-end">
              <div class="flex items-center cursor-pointer select-none group">
                <div class="text-grey-darkest group-hover:text-indigo-dark focus:text-indigo-dark mr-1 whitespace-no-wrap">
                  <span>{{ $page.auth.user.firstname }}</span>
                  <span class="hidden md:inline">{{ $page.auth.user.lastname }}</span>
                </div>

              </div>
              <div  class="mt-2 py-2 shadow-lg bg-white rounded text-sm">

                <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('customer.create')">Add Credit Card</inertia-link>
                <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('logout')" method="post">Logout</inertia-link>
              </div>
            </div>
          <!-- </div> -->
     <!-- <div> -->
</template>
