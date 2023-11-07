<template>
    <div class="contacts-container">
        <div>
            This will show the contacts container
        </div>

        <button @click="toggleFormDisplay">Show</button>
        <div v-show="toggleForm" class="flex flex-row">

            <form @submit="onSubmit">
                <div class="flex m-3">
                    <label class="flex-auto w-32">First Name</label>
                    <input class="flex-auto w-64" type="text" v-model="firstname" name="firstname" placeholder="Add first name" required />
                </div>

                <div class="flex m-3">
                    <label class="flex-auto w-32">Last Name</label>
                    <input class="flex-auto w-64" type="text" v-model="lastname" name="lastname" placeholder="Add last name" required />
                </div>

                <div class="flex m-3">
                    <label class="flex-auto w-32">Email</label>
                    <input class="flex-auto w-64" type="email" v-model="email" name="email" placeholder="Add email" required />
                </div>

                <input type="submit" value="Save Contact" class="cursor-pointer" />
            </form>
        </div>

        <div class="overflow-auto max-h-96">
            <div :key="contact.id" v-for="contact in store.contacts">
                <contact-item :contact="contact" />
            </div>
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
                firstname: '',
                lastname: '',
                email: '',
                toggleForm: false,
            }
        },

        methods: {
            async onSubmit(event) {
                event.preventDefault();

                const newContact = {
                    firstname: this.firstname,
                    lastname: this.lastname,
                    email: this.email
                };

                const res = await fetch("api/contacts/store/", {
                    method: 'POST',
                    headers: {
                        'Content-type': 'application/json',
                    },
                    body: JSON.stringify(newContact)
                });

                const data = await res.json();
                console.log(data);

                this.firstname = '';
                this.lastname = '';
                this.email = '';
            },

            toggleFormDisplay() {
                this.toggleForm = !this.toggleForm;
            }
        }
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