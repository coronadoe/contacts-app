<template>
    <div class="contacts-container">
        This will show the contacts container

        <div :key="contact.id" v-for="contact in store.contacts" class="columns-1" >
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
    });
</script>

<script setup>
    import { onMounted } from "vue";
    import { contactsStore } from "@/stores/ContactsStores";

    const store = contactsStore();

    onMounted(async () => {
        await store.fetchContacts();
    });


</script>


<style></style>