<template>
    <div class="contacts-container">
        This will show the contacts container

        <div :key="contact.id" v-for="contact in contacts"  >
            <contact-item :contact="contact" />
        </div>
    </div>
</template>

<script>

    import { defineComponent } from "vue";
    import ContactItem from "./ContactItem.vue";

    export default defineComponent({
        name: 'ContactComponent',

        components: {
            ContactItem
        },

        data() {
            return {
                contacts: []
            }
        },

        methods: {
            async fetchContacts() {
                const res = await fetch('api/contacts');
                const data = await res.json();

                return data.contacts;
            }
        },

        async created() {
            this.contacts = await this.fetchContacts();
        }

    });
</script>

<style></style>