<template>
    <div class="product-detail">
      <!-- Product Stock Status -->
      <p class="stock-status" :class="{ inStock: stockStatus === 'In Stock' }">
        {{ stockStatus }}
      </p>
  
      <!-- Product Title -->
      <h1>{{ title }}</h1>
  
      <!-- Product Ratings -->
      <p class="ratings">★ {{ rating }} ({{ reviewsCount }} Reviews)</p>
  
      <!-- Product Price -->
      <div class="price">
        <span class="current-price">${{ price }}</span>
        <span class="original-price" v-if="originalPrice">${{ originalPrice }}</span>
      </div>
  
      <!-- Product Description -->
      <p class="description">{{ description }}</p>
  
      <!-- Add to Cart Section -->
      <div class="add-to-cart">
        <input type="number" v-model.number="quantity" min="1" />
        <button @click="addToCart">Add to Cart</button>
        <button><i class="fa fa-heart"></i></button>
        <button><i class="fa fa-share"></i></button>
      </div>
  
      <!-- Vendor and SKU -->
      <div class="meta-info">
        <p><strong>Vendor:</strong> {{ vendor }}</p>
        <p><strong>SKU:</strong> {{ sku }}</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "ProductDetail",
    props: {
      stockStatus: {
        type: String,
        required: true,
      },
      title: {
        type: String,
        required: true,
      },
      rating: {
        type: Number,
        required: true,
      },
      reviewsCount: {
        type: Number,
        required: true,
      },
      price: {
        type: Number,
        required: true,
      },
      originalPrice: {
        type: Number,
        default: null,
      },
      description: {
        type: String,
        required: true,
      },
      vendor: {
        type: String,
        required: true,
      },
      sku: {
        type: String,
        required: true,
      },
    },
    data() {
      return {
        quantity: 1,
      };
    },
    methods: {
      addToCart() {
        this.$emit("add-to-cart", { quantity: this.quantity });
      },
    },
  };
  </script>
  
  <style scoped>
  .product-detail {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .stock-status {
    font-weight: bold;
  }
  .stock-status.inStock {
    color: green;
  }
  h1 {
    font-size: 1.5rem;
    margin: 0;
  }
  .ratings {
    color: #ffa500;
  }
  .price {
    display: flex;
    gap: 10px;
    align-items: baseline;
  }
  .current-price {
    font-size: 1.5rem;
    color: #1abc9c;
  }
  .original-price {
    text-decoration: line-through;
    color: grey;
  }
  .description {
    color: #666;
  }
  .add-to-cart {
    display: flex;
    gap: 10px;
    align-items: center;
  }
  .add-to-cart input {
    width: 50px;
    padding: 5px;
  }
  .meta-info p {
    margin: 5px 0;
  }
  </style>
  