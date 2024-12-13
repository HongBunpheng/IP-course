<template>
  <div class="container">
    <router-link to="ProductView">
    <div class="product">
      <img :src="image" :alt="name" class="product-image" />
      <h3 class="product-name">{{ name }}</h3>
      <p class="product-rating">Rating: {{ rating }}</p>
      <p class="product-size">{{ size }}</p>
      <p class="product-price">{{ price }}</p>
      <p class="product-instock">In Stock: {{ instock }}</p>
    </div>
    </router-link>
  </div>
  </template>
  
  <script>
  export default {
    name: "product",
    props: {
      name: String,
      rating: String,
      size: String,
      image: String,
      price: String,
      promotionAsPercentage: String,
      categoryId: Number,
      instock: Number,
      countSold: Number,
      group: String
    }
  };
  </script>
  
  <style>
  .container {
  display: grid;
 
  }
  .product {
    display: flex;
    flex-direction: column;
    align-items:first baseline;
    border: 1px solid lightgray;
    padding: 10px;
    margin: 3px;
    border-radius: 10px;
    width: 200px;
    background-color: white;
  }
  .product-image {
    width: 90%;
    height: 80%;
    margin-bottom: 5px;
    margin: 0 auto;
  }
  .product-name {
    font-weight: bold;
    margin: 5px 0;
  }
  .product-price {
    color: green;
    font-size: 17px;
  }
  .product-popular {
    color: orange;
    font-weight: bold;
  }
  .product-rating{
    color: orange;
  }
  </style>
  