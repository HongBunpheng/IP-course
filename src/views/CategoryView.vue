<template>
    <div class="def">
    <PageHeader></PageHeader>
    </div>
  </template>
  
  <script>
import PageHeader from '@/components/pageHeader.vue';

  export default {
    name: "CategoryView",
    components: {
      PageHeader,
      
    },
  };
  </script>
  
  <style scoped>
.def{
  display: flex;
  flex-direction: column;
}
  </style>
  