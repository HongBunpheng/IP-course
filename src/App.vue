<script>
import compon1 from './components/compon1.vue';
import compon2 from './components/compon2.vue';
import axios from 'axios';
export default {
  name: "App",
  components: {
    compon1,compon2
  },
  data() {
    return {
      categories: [
        
      ],
      promos: [
       
      ],
    };
  },
  mounted () {
          // Mounted life cycle - It will be executed every time
          // this component is loaded
          this.fetchCategories()
          this.fetchPromotions()
     },
  methods: {
         fetchCategories() { 
           axios.get("http://localhost:3000/api/categories").then((result)=>{
            this.categories = result.data
           })
         },
         fetchPromotions() {
          axios.get("http://localhost:3000/api/promotions").then((result)=>{
            this.promos = result.data
           })
     },
},
};
</script>
<template>
  <div class="app">
    <h1>This is my first VueJs project</h1>
    <div class="category-row">
      <compon1
        v-for="(category, index) in categories"
      
        :key="index"
        :name="category.name"
        :productCount="category.productCount"
        :image="category.image"
        :color="category.color"
      />
    </div>
    <div class="promo-row">
      <compon2
        v-for="(promo, index) in promos"
        :key="index"
        :title="promo.title"
        :image="promo.image"
        :color="promo.color"
        :buttonColor="promo.buttonColor"
      />
    </div>
  </div>
</template>
<style>
template{
  position: relative;
}
.app {
  position: absolute;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  left:11%;
  right: 10%;
  top: 15%;
}
.category-row {
  display: flex;
  flex-direction: row;
  gap: 15px;
  margin-bottom: 10px;
}
.promo-row {
  display: flex;
  gap: 15px;
}
</style>

