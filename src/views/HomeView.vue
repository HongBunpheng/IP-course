<script>
import category from "../components/catagory.vue";
import promotion from "../components/promotion.vue";
import Product from "../components/Product.vue";
import { useProductStore } from "../stores/productStore";
import Menu from "../components/Menu.vue";
import Showcase from "../components/showCase.vue";
import { ref, computed, onMounted } from "vue";


export default {
  name: "HomeView",
  components: {
    Menu,
    category,
    promotion,
    Product,
    Showcase,
  },
  data() {
    return {
    };
  },
  setup() {
    const productStore = useProductStore();

    // Independent state for category menu
    const selectedGroup = ref("All");

    // Independent state for product menu
    const selectedProductGroup = ref("All");

    const searchQuery = ref("");
    const searchResults = computed(() => {
      if (!searchQuery.value) return productStore.products;
      return productStore.products.filter((product) =>
        product.name.toLowerCase().includes(searchQuery.value.toLowerCase())
      );
    });

    // Compute unique group names for categories
    const uniqueGroups = computed(() => {
      const groups = productStore.categories.map((cat) => cat.group);
      return ["All", ...new Set(groups)];
    });

    // Compute unique group names for products
    const uniqueProductGroups = computed(() => {
      const groups = productStore.products.map((product) => product.group);
      return ["All", ...new Set(groups)];
    });

    // Filter categories by the selected group
    const filteredCategories = computed(() => {
      if (selectedGroup.value === "All") return productStore.categories;
      return productStore.categories.filter(
        (category) => category.group === selectedGroup.value
      );
    });

    // Filter products by the selected product group
    const filteredProducts = computed(() => {
      if (selectedProductGroup.value === "All") return searchResults.value;
      return searchResults.value.filter(
        (product) => product.group === selectedProductGroup.value
      );
    });

    // Fetch initial data
    onMounted(() => {
      productStore.fetchGroups();
      productStore.fetchPromotions();
      productStore.fetchCategories();
      productStore.fetchProducts();
    });

    return {
      productStore,
      uniqueGroups,
      uniqueProductGroups,
      filteredCategories,
      filteredProducts,
      selectedGroup,
      selectedProductGroup,
      searchQuery,
    };
  },
};
</script>

<template>
  <div class="app">
    <!-- Showcase -->
      <Showcase />
    <!-- Menu for Categories -->
    <div class="menuCategorybar">
      <div>Featured Categories</div>
      <Menu
        :menuItems="uniqueGroups"
        @menu-selected="(group) => (selectedGroup = group)"
      ></Menu>
    </div>
    <!-- Category Row -->
    <div class="category-row">
      <category
        v-for="(category, index) in filteredCategories"
        :key="index"
        :name="category.name"
        :productCount="category.productCount"
        :image="category.image"
        :color="category.color"
      />
    </div>

    <!-- Promotion Row -->
    <div class="promo-row">
      <promotion
        v-for="(promo, index) in productStore.promotions"
        :key="index"
        :title="promo.title"
        :image="promo.image"
        :color="promo.color"
        :buttonColor="promo.buttonColor"
      />
    </div>

    <!-- Menu for Products -->
    <div class="menuProductbar">
      <div>Popular Product</div>
      <Menu
        :menuItems="uniqueProductGroups"
        @menu-selected="(group) => (selectedProductGroup = group)"
      ></Menu>
    </div>
    <!-- Product Row -->
    <div class="product-row">
      <Product
        v-for="(product, index) in filteredProducts"
        :key="index"
        :name="product.name"
        :rating="product.rating"
        :size="product.size"
        :image="product.image"
        :price="product.price"
        :promotionAsPercentage="product.promotionAsPercentage"
        :categoryId="product.categoryId"
        :instock="product.instock"
        :countSold="product.countSold"
        :group="product.group"
      />
    </div>
    
  </div>
</template>

<style>
.app {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
}
.category-row,
.promo-row {
  display: flex;
  flex-direction: row;
  gap: 15px;
  margin-bottom: 10px;
}
.product-row {
  display: grid;
  grid-template-columns: auto auto auto auto auto auto;
  gap: 11px;
}
.menuCategorybar {
  display: flex;
  gap: 500px;
  font-size: larger;
}
.menuProductbar {
  display: flex;
  gap: 800px;
  font-size: larger;
}


</style>
