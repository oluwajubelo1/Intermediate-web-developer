<script>
import generalnav from '@/Shared/header'
export default {
    props: ["cards"],
    data() {
        return {
            sending: false
        };
    },
    components:{
      generalnav
    },
    methods: {
      deleteCard(id){
        if (confirm('Are you sure you want to delete this credit card?')) {
        this.$inertia.delete(this.route('credit.destroy',id))
      }
      },
        logout() {
            this.sending = true;
            this.$inertia.post("/logout").then(() => (this.sending = false));
        }
    }
};
</script>
<template>
    <div>
      <div v-if="cards=='blocked'">
        <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('logout')" method="post">Logout</inertia-link>
            <h1>You are temporary blocked</h1>
          </div>
          <div  v-else>
          <generalnav></generalnav>

        <div>
            <table>
                <thead>
                    <tr class="border-b">
                        <th class="px-3 py-2">Customer Id</th>
                        <th class="px-3 py-2">Number</th>
                        <th class="px-3 py-2">Expire</th>
                        <th class="px-3 py-2">Brand</th>
                        <th class="px-3 py-2">Delete</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr
                        v-for="card in cards"
                        :key="card.id"
                        class="odd:bg-gray-100"
                    >
                        <td class="p-3">{{ card.customer_id }}</td>
                        <td class="p-3">{{ card.number }}</td>
                        <td class="p-3">{{ card.expire }}</td>
                        <td class="p-3">{{ card.brand }}</td>
                        <td class="p-3">
                          <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" @click.prevent="deleteCard(card.id)" href="#">Delete</inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </div>
</template>
