<template>
  <div class="promo-banner" :style="{ backgroundColor: color }">
    <div>
    <h2>{{ title }}</h2>
    <mybutton @click = "shopNow()" :bgColor="buttonColor" />
    </div>
    <img :src="image" alt="promo image" class="promo-image" >
  </div>
</template>

<script>
import mybutton from './mybutton.vue';
export default {
  name: "promotion",
  props: {
    title: String,
    image: String,
    color: String,
    buttonColor: { 
      type: String,
    }
  },
  components:{
    mybutton,
  },
  methods:{
    shopNow(){
        alert("Let's shop: "+ this.title);
        }
    }
};
</script>

<style scoped>
.promo-banner {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 20px;
  border-radius: 10px;
  color: #333;
  height: 250px;
  width: 420px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
h2 {
  font-size:21px;
  font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
  color: rgb(46, 43, 65);
}
.promo-image {
  margin-top: 50px;
  width: 160px;
  height: auto;
}
</style>
