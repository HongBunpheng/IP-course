<script>
import compon1 from './components/compon1.vue';
import compon2 from './components/compon2.vue';
export default {
  name: "App",
  components: {
    compon1,compon2
  },
  data() {
    return {
      categories: [
        { image: "src/assets/cat-13 1.png",title: "Cake & Milk", items: 14 , bgColor: "#f2fce4"},
        { title: "Peach", items: 17, image: "src/assets/cat-11 1.png", bgColor: "#fffceb" },
        { title: "Organic Kiwi", items: 21, image: "src/assets/cat-12 1.png", bgColor: "#ecffec"  },
        { title: "Red Apple", items: 68,image: "src/assets/cat-9 1.png", bgColor: "#feefea"  },
        { title: "Snack", items: 34, image: "src/assets/cat-3 1.png", bgColor: "#fff3eb"  },
        { title: "Black plum", items: 25,image: "src/assets/cat-4 1.png", bgColor: "#fff3ff"  },
        { title: "Vegetables", items: 65, image: "src/assets/cat-1 4.png", bgColor: "#f2fce4" },
        { title: "Headphone", items: 33, image: "src/assets/cat-15 1.png", bgColor: "#fffceb"  },
        { title: "Cake & Milk", items: 54, image: "src/assets/cat-14 1.png", bgColor: "#f2fce4"  },
        { title: "Orange", items: 63,image: "src/assets/cat-7 1.png", bgColor: "#fff3ff"  },
      ],
      promos: [
        {
          title: "Everyday Fresh & Clean with Our Products",
          image: "src/assets/Cms-04 1.png",
          bgColor: "#f0e8d5",
          buttonColor: "#34a853",
        },
        {
          title: "Make your Breakfast Healthy and Easy",
          image: "src/assets/Cat-01 1.png",
          bgColor: "#f3e8e8",
          buttonColor: "#34a853",
        },
        {
          title: "The best Organic Products Online",
          image: "src/assets/Cms-03 1.png",
          bgColor: "#e7eaf3",
          buttonColor: "#f5cb0f",
        },
      ],
    };
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
        :title="category.title"
        :items="category.items"
        :image="category.image"
        :bgColor="category.bgColor"
      />
    </div>
    <div class="promo-row">
      <compon2
        v-for="(promo, index) in promos"
        :key="index"
        :title="promo.title"
        :image="promo.image"
        :bgColor="promo.bgColor"
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

