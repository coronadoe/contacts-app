<template>
    <div class="mx-2 my-2 px-2 py-2 border border-solid
                rounded-lg border-amber-600 hover:border-amber-300 transition-all
                duration-300 ease-linear bg-neutral-600 cursor-pointer">
        <div> <span>First Name:</span> {{ contact.firstname }}</div>
        <div> <span>Last Name:</span> {{ contact.lastname }}</div>
        <div> <span>Email:</span> {{ contact.email }}</div>

        <button-component :text="btnRemove" @click="onDelete(contact.id)" />
    </div>
</template>

<script>
    import { defineComponent } from 'vue';
    import ButtonComponent from '../generic/ButtonComponent.vue';

    export default defineComponent({
        name: 'ContactItem',

        props: {
            contact: Object,
            btnRemove: {
                type: String,
                default: 'Remove'
            }
        },

        components: {
            ButtonComponent
        },

        methods: {
            async onDelete(id) {

                const res = await fetch(`api/contacts/delete/${id}`, {
                    method: 'DELETE'
                });

                const data = await res.json();

                console.log(data);
            }
        }
    });

</script>


<style scoped></style>