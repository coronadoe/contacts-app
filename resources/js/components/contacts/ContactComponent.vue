<template>
    <div class="contacts-container">
        This will show the contacts container

        <div>
            <form @submit="onSubmit">

                <div>
                    <label>First Name</label>
                    <input type="text" v-model="firstname" name="firstname" placeholder="Add first name" required />
                </div>

                <div>
                    <label>Last Name</label>
                    <input type="text" v-model="lastname" name="lastname" placeholder="Add last name" required />
                </div>

                <div>
                    <label>Email</label>
                    <input type="email" v-model="email" name="email" placeholder="Add email" required />
                </div>

                <input type="submit" value="Save Contact" />
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
                email: ''
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