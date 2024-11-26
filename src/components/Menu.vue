<template>
  <div class="menu-container">
    <button
      v-for="menuItem in menuItems"
      :key="menuItem"
      :class="{ active: menuItem === selectedMenu }"
      @click="selectMenu(menuItem)"
    >
      {{ menuItem }}
    </button>
  </div>
</template>

<script>
export default {
  name: "Menu",
  props: {
    menuItems: Array,
  },
  emits: ["menu-selected"],
  data() {
    return {
      selectedMenu: "All",
    };
  },
  methods: {
    selectMenu(menuItem) {
      this.selectedMenu = menuItem;
      this.$emit("menu-selected", menuItem);
    },
  },
};
</script>

<style>
button{
  padding-left: 30px;
  background: transparent;
  color: lightgrey;
  border: none;
  cursor: pointer;
  width: auto;
  height: 30px;
  
}
button:hover{
  color:green;
}
button.active{
  color: yellow;
}
</style>
