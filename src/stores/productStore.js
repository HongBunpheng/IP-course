// src/stores/productStore.js
import { defineStore } from 'pinia'
import axios from 'axios'

export const useProductStore = defineStore('product', {
  state: () => ({
    groups: [],
    promotions: [],
    categories: [],
    products: []
  }),
  getters: {
    // Get all categories by group name
    getCategoriesByGroup: (state) => {
      return (groupName) => state.categories.filter((category) => category.group === groupName)
    },
    getPromtionsByGroup: (state) => {
      return (groupName) => state.promotions.filter((promotion) => promotion.group === groupName)
    },

    // Get all products by group name
    getProductsByGroup: (state) => {
      return (groupName) => state.products.filter((product) => product.group === groupName).slice(0, 2); // Only show 2 products
    },
    
    // Get all products by category ID
    getProductsByCategory: (state) => {
      return (categoryId) => state.products.filter((product) => product.categoryId === categoryId)
    },
    
    // Get popular products with countSold > 10
    getPopularProducts: (state) => {
      console.log("All Products:", state.products);
      const popularProducts = state.products.filter((product) => product.countSold > 10);
      console.log("Popular Products:", popularProducts);
      return popularProducts;
    }
    
  },
  
  actions: {
    async loadCategories() {
      this.categories = []; // Reset array before loading
      const response = await axios.get('http://localhost:3000/api/categories');
      this.categories = response.data;
    },
    async loadPromotions() {
      this.promotions = []; // Reset array before loading
      const response = await axios.get('http://localhost:3000/api/promotions');
      this.promotions = response.data;
    },
    async loadGroups() {
      this.groups = []; // Reset array before loading
      const response = await axios.get('http://localhost:3000/api/groups');
      this.groups = response.data;
    },
    async loadProducts() {
      this.products = []; // Reset array before loading
      const response = await axios.get('http://localhost:3000/api/products');
      this.products = response.data;
    },
    async loadAllData() {
      await Promise.all([this.loadCategories(), this.loadPromotions(), this.loadGroups(), this.loadProducts()]);
      console.log("Categories:", this.categories);
      console.log("Promotions:", this.promotions);
      console.log("Groups:", this.groups);
      console.log("Products:", this.products);
    }
    
  }
})
