<template>
    <div class="def">
        <ProductDetail></ProductDetail>
        <ProductImage></ProductImage>
    </div>
  </template>
  
  <script>


import ProductDetail from '@/components/productDetail.vue';
import ProductImage from '@/components/productImage.vue';

  export default {
    name: "ProductView",
    components: {
      ProductDetail,
      ProductImage,
      
    },
  };
  </script>
  
  <style scoped>
.def{
  display: flex;
  flex-direction: column;
}
  </style>