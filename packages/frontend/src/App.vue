<template>
  <div>
    <div class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container d-flex justify-content-between">
        <a
          href="#"
          class="navbar-brand d-flex align-items-center"
        >
          <strong>GoodMeal</strong>
        </a>
        <button
          type="button"
          class="nav-btn"
        >
          <BIconSliders />
        </button>
      </div>
    </div>
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
