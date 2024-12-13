<template>
  <div class="navigation-bar">
      <div class="Topbar">
      <img src="./assets/Logo.png" />
      <div class="searchbox-container">
        <SearchBox
          :products="uniqueProductGroups"
          :categories="uniqueGroups"
          @query-changed="(query) => (searchQuery = query)"
        />
      </div>
      <div class="userbar">
        <router-link to="CategoryView"><MenuItem label="Account" icon="fa fa-user" /></router-link>
        <MenuItem label="Compare" icon="fa fa-code-compare" />
        <MenuItem label="Wishlist" icon="fa fa-heart" />
        <MenuItem label="Cart" icon="fa fa-cart-shopping" />
      </div>
    </div>
    <div class="navigation">
      <MenuItem
        class="browse"
        label="Browse All Categories"
        icon="fa fa-th-large"
        hasDropdown
        :dropdownItems="cate"
      ></MenuItem>
      <MenuItem label="Hot Deals" icon="fa fa-fire" />
      <MenuItem label="Home"></MenuItem>
      <MenuItem
        label="Food"
        hasDropdown
        :dropdownItems="['Fruits', 'Meat', 'Snacks']"
      />
      <MenuItem label="Vegetables" hasDropdown :dropdownItems="[]" />
      <MenuItem label="Drink"></MenuItem>
      <MenuItem label="Cookies"></MenuItem>
      <MenuItem
        label="Meat & Seafood"
        hasDropdown
        :dropdown-items="[]"
      ></MenuItem>
      <MenuItem label="Bakery"></MenuItem>
      <div class="contact">
        <img src="./assets/Hotline.png" />
      </div>
    </div>
    </div>
  <router-view></router-view>
</template>

<script>
import SearchBox from "./components/SearchBox.vue";
import MenuItem from "./components/MenuItem.vue";

export default {
  name: "App",
  components: {
    SearchBox,
    MenuItem,
  },
  data() {
    return {
      cate: ["Vegetables", "Fruits", "Dairy", "Bakery"],
      searchQuery: "",
      uniqueGroups: ["All", "Vegetables", "Fruits", "Dairy", "Bakery"],
      uniqueProductGroups: ["All", "Group 1", "Group 2", "Group 3"],
    };
  },
};
</script>
<style scoped>
.navigation {
  display: flex;
  flex-direction: row;
  gap: 10px;
  padding: 5px;
  margin-top: 10px;
  border-top: 1px solid rgb(233, 231, 231);
  border-bottom: 1px solid rgb(233, 231, 231);
}
.browse {
  background-color: #1abc9c;
  color: white;
  padding: 12px;
  border-radius: 5px;
}
.contact img {
  display: flex;
  flex-direction: row;
  margin: 7px 0 0 90px;
  width: 50%;
}
.Topbar {
  display: flex;
  flex-direction: row;
  gap: 30px;
}
.userbar {
  display: flex;
  flex-direction: row;
  gap: 10px;
  padding: 10px 0 0 50px;
}
.searchbox-container {
  padding: 10px 0 0 50px;
}
</style>