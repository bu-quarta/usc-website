<script setup lang="ts"></script>

<template>
  <div>
    <div>
      <div class="z-20 relative bg-background">
        <Header />
      </div>
      <div class="-z-20 text-sm">
        <slot />
      </div>
      <Footer />
    </div>

    <Login />
    <LoginRequired />
  </div>
</template>

<style scoped></style>
