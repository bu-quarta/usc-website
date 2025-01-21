<script setup lang="ts">
  const { togglePioDeleteEventDialog, togglePioEditEventDialog } = useStates()

  const props = defineProps<{ event: EventPost }>()
  const emit = defineEmits(["delete", "edit"])

  const config = useRuntimeConfig()
  const image_url = computed(() => `${config.public.backendUrl}${props.event.image_url}`)
</script>

<template>
  <Card class="border-none shadow-none">
    <CardContent class="p-0">
      <AspectRatio v-if="image_url" :ratio="3 / 2">
        <NuxtImg :src="image_url" alt="news" class="rounded-md object-cover w-full h-full" />
      </AspectRatio>
      <Skeleton v-else class="aspect-[3/2]" />

      <CardHeader class="px-0 py-2">
        <CardTitle class="text-lg leading-tight line-clamp-2">{{ event.title }} </CardTitle>
        <h5 :class="`line-clamp-2 font-light leading-tight `">
          {{ event.description }}
        </h5>

        <div class="leading-tight">
          <h6 class="flex items-center gap-0.5">
            <div>
              <Icon name="mdi:location" />
            </div>
            <span class="truncate"> {{ event.location }} </span>
          </h6>
          <h6 class="flex items-center gap-0.5">
            <Icon name="mingcute:time-fill" />
            <span> {{ event.date_time }} </span>
          </h6>
        </div>

        <CardDescription class="text-xs mt-0.5">POSTED | {{ event.date_time_posted }} </CardDescription>
      </CardHeader>
      <div class="flex gap-2">
        <Button
          size="sm"
          @click="
            () => {
              emit('edit')
              togglePioEditEventDialog = true
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
              togglePioDeleteEventDialog = true
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
