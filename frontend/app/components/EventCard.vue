<script setup lang="ts">
  const props = withDefaults(defineProps<{ eventPost: EventPost; pastEvent?: boolean }>(), {
    pastEvent: false,
  })

  const config = useRuntimeConfig()
  const image_url = computed(() => `${config.public.backendUrl}${props.eventPost.image_url}`)
</script>

<template>
  <Card class="border-none">
    <CardContent class="p-0">
      <AspectRatio v-if="image_url">
        <NuxtImg :src="image_url" alt="news" class="rounded-md object-cover w-full h-full" />
      </AspectRatio>
      <Skeleton v-else class="aspect-square" />

      <div class="space-y-4 text-xs">
        <div class="space-y-2 mt-4">
          <Label
            v-if="!pastEvent"
            class="font-medium uppercase text-xs"
            :style="{ color: eventPost.status === 'ONGOING' ? '#FFA200' : '#EA3333' }"
            >{{ eventPost.status }}</Label
          >
          <p class="text-lg font-semibold leading-5">{{ eventPost.title }}</p>
          <p>{{ eventPost.date_time }}</p>
        </div>
        <div class="flex items-start gap-1">
          <Icon name="mdi:location" class="size-4" />
          <p>{{ eventPost.location }}</p>
        </div>

        <Button v-if="pastEvent" size="sm">
          <p>Evaluate</p>
          <Icon name="lucide:pencil" />
        </Button>
      </div>
    </CardContent>
  </Card>
</template>

<style scoped></style>
