<script setup lang="ts">
  withDefaults(defineProps<{ aspect?: string; clamp?: string }>(), {
    aspect: "5/4",
    clamp: "3",
  })
</script>

<template>
  <Card class="border-none">
    <CardContent class="p-0">
      <Skeleton :class="`aspect-[${aspect}]`" />

      <CardHeader class="px-0 py-2">
        <CardTitle class="text-lg">Praesentium sed in corrupti odit architecto </CardTitle>
        <CardDescription class="text-xs">SEPTEMBER 15, 2024</CardDescription>
        <h4 :class="`line-clamp-${clamp} font-light leading-tight `">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde molestiae minima distinctio omnis Lorem ipsum dolor sit amet,
          consectetur adipisicing elit. Consectetur, unde ipsa esse rem consequuntur fugit dolorum tempore at fugiat, eius neque expedita
          totam asperiores iusto ad, natus assumenda rerum quod.
        </h4>
      </CardHeader>
    </CardContent>
  </Card>
</template>

<style scoped></style>
