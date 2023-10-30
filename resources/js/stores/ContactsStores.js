import { defineStore } from 'pinia';

export const contactsStore = defineStore('contacts', {
    state: () => ({
        contacts: []
    }),

    actions: {
        fetchContacts() {
            fetch('api/contacts')
                .then(res => res.json())
                .then(json => {
                    this.contacts = json.contacts;
                })
        }
    }

});