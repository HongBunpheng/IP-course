<script>
import category from './components/catagory.vue';
import promotion from './components/promotion.vue';
import Product from './components/Product.vue';
import { useProductStore } from './stores/productStore';
import { onMounted } from 'vue';
import { mapState } from 'pinia';

export default {
  name: "App",
  components: {
    category,
    promotion,
    Product
  },

  setup() {
    const productStore = useProductStore();

    // Load all data on component mount
    onMounted(() => {
      productStore.loadAllData();
    });
    
    // Define any reactive properties needed for getters
    const currentGroupName = 'fruits'; // example
    const selectedCategoryId = 1; // example category ID

    return {
      currentGroupName,
      selectedCategoryId,
      productStore
    };
  },

  computed: {
  ...mapState(useProductStore, {
    popularProducts: 'getPopularProducts' 
  }),

  categories() {
    return this.productStore.getCategoriesByGroup(this.currentGroupName);
  },
  promotions() {
    return this.productStore.getCategoriesByGroup(this.currentGroupName);
  },
  productsByGroup() {
    return this.productStore.getProductsByGroup(this.currentGroupName);
  },
  productsByCategory() {
    return this.productStore.getProductsByCategory(this.selectedCategoryId);
  }
}
};
</script>

<template>
  <div class="app">
    <!-- Category Section -->
    <div class="category-row">
      <category
        v-for="(category, index) in categories"
        :key="index"
        :name="category.name"
        :productCount="category.productCount"
        :image="category.image"
        :color="category.color"
      /> 
    </div>

    <!-- Promotion Section -->
    <div class="promo-row">
      <promotion
        v-for="(promo, index) in promotions"
        :key="index"
        :title="promo.title"
        :image="promo.image"
        :color="promo.color"
        :buttonColor="promo.buttonColor"
      />
    </div>

    <!-- Product Section -->
    <div class="product-row">
      <Product
        v-for="product in productsByGroup"
        :key="product.id"
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
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  left: 11%;
  right: 10%;
  top: 15%;
}
.category-row, .promo-row, .product-row {
  display: flex;
  flex-direction: row;
  gap: 15px;
  margin-bottom: 10px;
}
</style>
