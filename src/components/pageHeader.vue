<template>
    <div class="pageheader"> 
        <div class="head-title">Cake & Milk</div>
        <div class="link-details">Home > Categories > Cake & Milk </div>
    </div>
</template>
<script>
export default{
    name: "Pageheader",
}
</script>
<style scoped>
.pageheader{
    display: flex;
    flex-direction: column;
    align-items:baseline;
    justify-content: center;
    background-color: #7de2ce;
    background-image: url('../assets/12Asset 1.png');
    width: 100%;
    height: 200px;
    border-radius: 15px;
    padding: 0 0 0 50px;

}
.head-title{
    font-size : 40px;
}
.link-details{
    font-size: 15px;
    color: gray;
    padding: 0 0 0 5px;
}
</style>