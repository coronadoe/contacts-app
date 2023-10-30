<template>
    <div class="contact">
        <div> <span>First Name:</span> {{ contact.firstname }}</div>
        <div> <span>Last Name:</span> {{ contact.lastname }}</div>
        <div> <span>Email:</span> {{ contact.email }}</div>

        <button-component :text="btnRemove" />
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
        }
    });

</script>


<style scoped>
    .contact {
        position: relative;
        border: 1px solid #dbd3d3;
        padding: 5px;
        margin: 10px;
        width: auto;
        border-radius: 5px;
    }

    .contact:hover {
        border-color: #000;
    }

</style>