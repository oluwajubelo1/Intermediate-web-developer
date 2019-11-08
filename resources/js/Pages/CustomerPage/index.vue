<script>
import generalnav from '@/Shared/header'
export default {
    props: ["customers"],
    data() {
        return {
            sending: false
        };
    },
    components:{
      generalnav
    },
    methods: {


    }
};
</script>
<template>
    <div>

          <generalnav></generalnav>

        <div>
            <table>
                <thead>
                    <tr class="border-b">
                        <th class="px-3 py-2">Customer Id</th>
                        <th class="px-3 py-2">First Name</th>
                        <th class="px-3 py-2">Last Name</th>
                        <th class="px-3 py-2">Email</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2"></th>
                        <th class="px-3 py-2"></th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    <tr
                        v-for="customer in customers"
                        :key="customer.id"
                        class="odd:bg-gray-100"
                    >
                        <td class="p-3">{{ customer.id }}</td>
                        <td class="p-3">{{ customer.firstname }}</td>
                        <td class="p-3">{{ customer.lastname }}</td>
                        <td class="p-3">{{ customer.email }}</td>
                        <td class="p-3" >{{ (customer.isBlocked==0)?'Active':'Blocked' }}</td>
                        <td class="p-3" v-if="customer.isBlocked==0">
                          <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('customer.action',{id:customer.id,isBlocked:customer.isBlocked})" method="put">Block</inertia-link>
                        </td>
                        <td class="p-3" v-else>
                          <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('customer.action',{id:customer.id,isBlocked:customer.isBlocked})" method="put">UnBlock</inertia-link>
                        </td>
                        <td class="p-3" >
                          <inertia-link class="block px-6 py-2 hover:bg-indigo hover:text-white" :href="route('customer.delete',customer.id)" method="delete" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</inertia-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
