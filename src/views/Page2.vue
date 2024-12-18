<template>
  <div class="page">
    <aside>
      <h3>Menu</h3>
      <ul>
        <li><router-link to="/page2/section/1">Section 1</router-link></li>
        <li><router-link to="/page2/section/2">Section 2</router-link></li>
        <li><router-link to="/page2/section/3">Section 3</router-link></li>
        <li><router-link to="/page2/section/4">Section 4</router-link></li>
      </ul>
    </aside>
    <section>
      <h2>Welcome to Page 2</h2>
      <!-- Display all messages -->
      <div v-if="!isSectionActive">
        <h3 class="messages" >Messages:</h3>
        <ul>
          <li v-for="(msg, index) in messages" :key="index">{{ msg }}</li>
        </ul>
      </div>
      <!-- Input and Button to Add Message -->
      <div v-if="!isSectionActive">
        <p>Add a Message:</p>
        <input v-model="message" placeholder="Enter your message" />
        <button @click="addMessage">Add Message</button>
      </div>
      <router-view />
    </section>
  </div>
</template>

<script>
import { messageStore } from '../stores/store.js';

export default {
  data() {
    return {
      message: '', // Input field for the new message
    };
  },
  computed: {
    messages() {
      return messageStore.messages; // Access global messages
    },
    isSectionActive() {
      // Check if a section route is active
      return this.$route.path.includes('/section/');
    },
  },
  methods: {
    addMessage() {
      if (this.message.trim() !== '') {
        // Add a contextual message to the global store
        messageStore.addMessage(`The message is from Page 2: ${this.message}`);
        this.message = ''; // Clear input field
      }
    },
  },
};
</script>
<style scoped>
.page {
  display: flex;
  height: calc(100vh - 100px); /* Full height minus header and footer */
}

aside {
  width: 20%;
  background-color: #f9f9f9;
  border-right: 1px solid #ddd;
  padding: 10px;
  box-sizing: border-box;
}

aside ul {
  list-style: none;
  padding: 0;
  margin: 0;

}

aside li {
  margin: 5px 0;
}

aside li a {
  display: block;
  padding: 5px 10px;
  border: 1px solid transparent;
  border-radius: 4px;
  transition: background-color 0.3s, border-color 0.3s;
}

aside li a:hover {
  background-color: #e6f7ff;
  border-color: #1890ff;
}

aside li a.active {
  background-color: #e6f7ff;
  border-color: #1890ff;
  font-weight: bold;
}

section {
  flex: 1;
  padding: 20px;
  box-sizing: border-box;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

h2 {
  margin-bottom: 10px;
}

h3 {
  margin-top: 10px;
  color: #333;
  font-size: 18px;
  text-align: left;

}
p{
  margin: 10px;
}
.messages{
  display: flex;
  align-items: baseline;
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