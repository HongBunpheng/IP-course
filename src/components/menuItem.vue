<template>
  <div class="menu-item" @click="handleClick">
    <!-- Icon (optional) -->
    <i v-if="icon" :class="icon" class="menu-icon"></i>

    <!-- Label -->
    <span>{{ label }}</span>

    <!-- Dropdown Indicator -->
    <i v-if="hasDropdown" class="fa fa-chevron-down" :class="{ active: isDropdownOpen }"></i>

    <!-- Dropdown Menu -->
    <div v-if="isDropdownOpen" class="dropdown">
      <slot name="dropdown-content">
        <div
          v-for="(item, index) in dropdownItems"
          :key="index"
          class="dropdown-item"
          @click.stop="navigateTo(item.route)"
        >
          {{ item.label }}
        </div>
      </slot>
    </div>
  </div>
</template>

<script>
export default {
  name: "MenuItem",
  props: {
    label: {
      type: String,
      required: true,
    },
    icon: {
      type: String,
      default: null,
    },
    hasDropdown: {
      type: Boolean,
      default: false,
    },
    dropdownItems: {
      type: Array,
      default: () => [], // Example: [{ label: 'Vegetables', route: '/vegetables' }]
    },
    route: {
      type: String,
      default: null, // Route for the menu item itself
    },
  },
  data() {
    return {
      isDropdownOpen: false,
    };
  },
  methods: {
    toggleDropdown() {
      if (this.hasDropdown) {
        this.isDropdownOpen = !this.isDropdownOpen;
      }
    },
    navigateTo(route) {
      if (route) {
        this.$router.push(route); // Use Vue Router to navigate
      }
    },
    handleClick() {
      if (this.route) {
        this.navigateTo(this.route);
      } else if (this.hasDropdown) {
        this.toggleDropdown();
      }
    },
  },
};
</script>

<style scoped>
.menu-item {
  display: flex;
  align-items: center;
  position: relative;
  cursor: pointer;
  font-size: 14px;
  font-weight: 500;
  margin: 0 10px;
  transition: color 0.3s ease;
}

.menu-item:hover {
  color: #1abc9c;
}

.menu-icon {
  margin-right: 8px;
  font-size: 16px;
}

.fa-chevron-down {
  margin-left: 8px;
  font-size: 12px;
  transition: transform 0.3s ease;
  color: lightgrey;
}

.fa-chevron-down.active {
  transform: rotate(180deg);
}

.dropdown {
  position: absolute;
  top: 100%;
  left: 0;
  background: #fff;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  z-index: 1000;
}

.dropdown-item {
  padding: 10px 20px;
  cursor: pointer;
  font-size: 10px;
  color: #333;
  transition: background-color 0.2s;
}

.dropdown-item:hover {
  background-color: #f0f0f0;
}
</style>
