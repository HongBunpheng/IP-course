<template>
  <div>
    <header>
      <div>Header</div>
      <nav>
        <router-link to="/page1">Page 1</router-link>
        <router-link to="/page2">Page 2</router-link>
        <router-link to="/page3">Page 3</router-link>
      </nav>
    </header>

    <main>
      <router-view />
    </main>

    <footer>
      <p>Footer</p>
    </footer>
  </div>
</template>

<style scoped>
header {
  background-color: #f4f4f4;
  padding: 10px;
  text-align: center;
  border-bottom: 1px solid #ddd;
  width: 600px;
  display: flex;
  flex-direction: row;
  gap: 270px;
}

header nav a {
  margin: 0 15px;
  font-size: 16px;
}

footer {
  background-color: #f4f4f4;
  padding: 10px;
  text-align: center;
  border-top: 1px solid #ddd;
  width: 600px;
}
</style>