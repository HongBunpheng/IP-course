<template>
  <div class="searchbox">
    <!-- Dropdown for Categories -->
    <select v-model="selectedCategory" class="category-dropdown">
      <option value="All Categories">All </option>
      <option
        v-for="(category, index) in categories"
        :key="index"
        :value="category"
      >
        {{ category }}
      </option>
    </select>

    <!-- Input for Search Query -->
    <input
      type="text"
      class="search-input"
      placeholder="|   Search for items"
      v-model="query"
      @input="updateQuery"
    >

    <!-- Search Icon -->
    <button class="search-button" @click="search">
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </div>
</template>

<script>
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';

export default {
  name: "SearchBox",
  props: {
    categories: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {
      selectedCategory: "All Categories",
      query: "",
    };
  },
  methods: {
    updateQuery() {
      this.$emit("query-changed", this.query);
    },
    search() {
      // You can emit the current search state if needed
      this.$emit("search-executed", {
        category: this.selectedCategory,
        query: this.query,
      });
    },
  },
};
</script>

<style scoped>
.searchbox {
  display: flex;
  align-items: center;
  gap: 10px;
  border: 1px solid #1abc9c;
  padding: 8px;
  border-radius: 6px;
  background-color: white;
  width: 500px;
}

.category-dropdown {
  padding: 8px;
  border: none;
  border-radius: 4px;
  font-size: 14px;
  cursor: pointer;
}
.category-dropdown:focus{
  outline: none;
}

.search-input {
  flex: 1;
  padding: 8px;
  border: 1px solid transparent; 
  border-radius: 4px;
  font-size: 13px;
}

.search-input:focus {
  outline: none; 
}
.search-input::placeholder {
  font-size: 10px;
  color: lightgrey; 
}


.search-button {
  padding: 8px 12px;
  background-color: none;
  border: none;
  color: gray;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;
}

.search-button:hover {
  background-color: lightgreen;
}

</style>
