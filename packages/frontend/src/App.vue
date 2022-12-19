<template>
  <header>
    <div
      class="collapse bg-dark"
      id="navbarHeader"
    ></div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container d-flex justify-content-between">
        <a
          href="#"
          class="navbar-brand d-flex align-items-center"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="20"
            height="20"
            fill="none"
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            aria-hidden="true"
            class="mr-2"
            viewBox="0 0 24 24"
            focusable="false"
          >
            <path
              d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"
            ></path>
            <circle
              cx="12"
              cy="13"
              r="4"
            ></circle>
          </svg>
          <strong>Vicuña Mackena</strong>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarHeader"
          aria-controls="navbarHeader"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
  <div class="container">
    <div
      class="text-center"
      style="margin: 20px 0px 20px 0px"
    >
      <span class="text-secondary"></span>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse">
        <div class="navbar-nav">
          <router-link
            to="/"
            class="nav-item nav-link"
            >Home</router-link
          >
          <router-link
            to="/add"
            class="nav-item nav-link"
            >Add Post</router-link
          >
        </div>
      </div>
    </nav>
    <br />
    <router-view></router-view>
  </div>
</template>

<script>
export default {};
</script>

<style></style>
