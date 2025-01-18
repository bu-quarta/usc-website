<script setup lang="ts">
  const props = defineProps<{ newsUpdates: NewsUpdate }>()
  const emit = defineEmits(["delete", "edit"])
  const { togglePioDeleteNewsAndUpdateDialog, togglePioEditNewsAndUpdateDialog } = useStates()

  const config = useRuntimeConfig()
  const image_url = computed(() => `${config.public.backendUrl}${props.newsUpdates.image_url}`)
</script>

<template>
  <Card class="border-none">
    <CardContent class="p-0">
      <AspectRatio v-if="image_url" :ratio="3 / 2">
        <NuxtImg :src="image_url" alt="news" class="rounded-md object-cover w-full h-full" />
      </AspectRatio>
      <Skeleton v-else class="aspect-[3/2]" />

      <CardHeader class="px-0 py-2">
        <CardTitle class="text-lg leading-tight line-clamp-2">{{ newsUpdates.title }} </CardTitle>
        <h5 :class="`line-clamp-2 font-light leading-tight `">
          {{ newsUpdates.description }}
        </h5>
        <CardDescription class="text-xs uppercase">{{ newsUpdates.date_time }} </CardDescription>
      </CardHeader>
      <div class="flex gap-2">
        <Button
          size="sm"
          @click="
            () => {
              emit('edit')
              togglePioEditNewsAndUpdateDialog = true
            }
          "
        >
          <Icon name="basil:edit-outline" class="-mt-0.5" />
          <span>Edit</span>
        </Button>
        <Button
          size="sm"
          variant="destructive"
          @click="
            () => {
              emit('delete')
              togglePioDeleteNewsAndUpdateDialog = true
            }
          "
        >
          <Icon name="material-symbols:delete-outline-rounded" class="-mt-0.5" />
          <span>Delete</span>
        </Button>
      </div>
    </CardContent>
  </Card>
</template>

<style scoped></style>
