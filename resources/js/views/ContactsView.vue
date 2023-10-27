<template>
    <div>this will display the contact list</div>

    <div>
        <contact-component />
    </div>
</template>

<script>
    import { defineComponent } from "vue";
    import ContactComponent from "../components/contacts/ContactComponent.vue";

    export default defineComponent({
        name: 'ContactsView',

        components: {
            ContactComponent
        }
    }) 

</script>