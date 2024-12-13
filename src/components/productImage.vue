<template>
    <div class="product-image">
      <!-- Main Image -->
      <img :src="mainImage" alt="Product Image" class="main-image" />
  
      <!-- Image Carousel -->
      <div class="image-carousel">
        <button @click="prevImage" class="carousel-nav">&#8249;</button>
        <div class="carousel-images">
          <img
            v-for="(image, index) in images"
            :key="index"
            :src="image"
            alt="Product Thumbnail"
            class="thumbnail"
            :class="{ active: mainImage === image }"
            @click="mainImage = image"
          />
        </div>
        <button @click="nextImage" class="carousel-nav">&#8250;</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "ProductImage",
    props: {
      images: {
        type: Array,
        required: true,
      },
    },
    data() {
      return {
        mainImage: this.images[0], // Default to the first image
      };
    },
    methods: {
      prevImage() {
        const currentIndex = this.images.indexOf(this.mainImage);
        const prevIndex = (currentIndex - 1 + this.images.length) % this.images.length;
        this.mainImage = this.images[prevIndex];
      },
      nextImage() {
        const currentIndex = this.images.indexOf(this.mainImage);
        const nextIndex = (currentIndex + 1) % this.images.length;
        this.mainImage = this.images[nextIndex];
      },
    },
  };
  </script>
  
  <style scoped>
  .product-image {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  .main-image {
    width: 300px;
    height: auto;
    border-radius: 10px;
    margin-bottom: 10px;
  }
  .image-carousel {
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .carousel-images {
    display: flex;
    gap: 5px;
  }
  .thumbnail {
    width: 50px;
    height: 50px;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid transparent;
    border-radius: 5px;
  }
  .thumbnail.active {
    border-color: #1abc9c;
  }
  .carousel-nav {
    background-color: transparent;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
  }
  </style>
  