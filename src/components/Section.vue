<template>
  <div class="base">
    <h3>This is Section {{ sectionId }} of {{ currentPage }}</h3>
    <!-- Show Messages -->
    <div>
      <h3>Messages:</h3>
      <ul>
        <li v-for="(msg, index) in messages" :key="index">{{ msg }}</li>
      </ul>
    </div>
    <!-- Input and Button to Add Message -->
    <div>
      <p>Add a Message:</p>
      <input v-model="message" placeholder="Enter your message" />
      <button @click="addMessage">Add Message</button>
    </div>
  </div>
</template>

<script>
import { messageStore } from '../stores/store.js'

export default {
  data() {
    return {
      message: '', // Input field for the new message
    };
  },
  computed: {
    sectionId() {
      return this.$route.params.id; // Get the section ID from the route parameter
    },
    currentPage() {
      const pageMatch = this.$route.path.match(/\/page(\d+)/);
      return pageMatch ? `Page ${pageMatch[1]}` : 'Unknown Page';
    },
    messages() {
      return messageStore.messages; // Access global messages
    },
  },
  methods: {
    addMessage() {
      if (this.message.trim() !== '') {
        // Add a contextual message to the global store
        messageStore.addMessage(
          `The message is from ${this.currentPage} Section ${this.sectionId}: ${this.message}`
        );
        this.message = ''; // Clear input field
      }
    },
  },
};
</script>
<style scoped>
.base{
  margin:10px;
}
input{
  border:1px solid hsla(160, 100%, 37%, 1);
  padding: 5px;
  border-radius: 5px;
  outline-color: rgb(0, 144, 96);
}
button{
  border:1px solid hsla(160, 100%, 37%, 1);
  padding: 5px;
  border-radius: 5px;
  background-color: hsla(160, 100%, 37%, 1);
  margin: 5px;
}
button:hover{
  background-color: rgb(47, 206, 153);
}
</style>