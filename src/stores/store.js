import { reactive } from 'vue';

export const messageStore = reactive({
  messages: [], // Array to store all messages
  addMessage(message) {
    this.messages.push(message); // Add a new message
  },
});