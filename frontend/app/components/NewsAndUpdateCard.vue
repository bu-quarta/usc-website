<script setup lang="ts">
  const props = withDefaults(defineProps<{ newsUpdate: NewsUpdate; aspect?: string; clamp?: string }>(), {
    aspect: "5/4",
    clamp: "3",
  })

  const config = useRuntimeConfig()
  const image_url = computed(() => `${config.public.backendUrl}${props.newsUpdate.image_url}`)
  const [x, y] = props.aspect.split("/").map(Number) as [number, number]
</script>

<template>
  <Card class="border-none">
    <CardContent class="p-0">
      <AspectRatio v-if="image_url" :ratio="x / y">
        <NuxtImg :src="image_url" alt="news" class="rounded-md object-cover w-full h-full" />
      </AspectRatio>
      <Skeleton v-else :style="{ aspectRatio: aspect }" />

      <CardHeader class="px-0 py-2">
        <CardTitle class="text-lg">{{ newsUpdate.title }} </CardTitle>
        <CardDescription class="text-xs">{{ newsUpdate.published_date }}</CardDescription>
        <h4 :class="`line-clamp-${clamp} font-light leading-tight `">{{ newsUpdate.description }}</h4>
      </CardHeader>
    </CardContent>
  </Card>
</template>

<style scoped></style>
