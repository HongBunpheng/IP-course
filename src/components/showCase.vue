<template>
  <div class="showcase">
    <div class="showcase-content">
      <h1>Don’t miss amazing grocery deals</h1>
      <p>Sign up for the daily newsletter</p>
      <div class="subscribe">
        <div class="input-wrapper">
          <i class="fa-solid fa-paper-plane" style="padding-top: 3px;"></i>
          <input
            type="email"
            placeholder="Your email address"
            class="subscribe-input"
          />
        </div>
        <button class="subscribe-button">Subscribe</button>
      </div>
    </div>
    <div class="showcase-image">
      <img src="../assets/fresh-apples-1.png" />
    </div>
  </div>
</template>

<script>
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';
export default {
  name: "Showcase",
};
</script>

<style scoped>
/* Showcase container */
.showcase {
  display: flex;
  align-items: center;
  background-color: #fdf4e7;
  border-radius: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  height: 310px;
  width: 800px;
  background-image: url('../assets/3389452 1.png');
  background-size: 100% 100%;
}

.showcase-content h1 {
  font-size: 2rem;
  font-weight: bold;
  color: rgb(28, 28, 62);
  margin: 0 0 10px 60px;
}

.showcase-content p {
  font-size: 15px;
  color: #555;
  margin: 0 0 20px 60px;
}

.subscribe {
  display: flex;
  align-items: center;
  margin: 0 0 20px 55px;
  background-color: white;
  border-radius: 30px;
  width: 250px;
  gap:10px;
}

.input-wrapper {
  color: #999;
  font-size: 10px;
  margin-left: 7px;
  display: flex;
}

.subscribe-input {
  border: none;
  outline: none;
  font-size: 10px;
  margin-left: 5px;
  background-color: transparent;
  display: flex;
  align-items: center;
}

.subscribe-button {
  display: flex;
  align-items: center;
  background-color: #1abc9c;
  color: white;
  border: none;
  padding: 10px 24px;
  font-size: 10px;
  border-radius: 30px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.subscribe-button:hover {
  background-color: #218838;
}

.showcase img {
  max-width: 490px;
  margin: 0 0 0 -80px;
}
</style>
