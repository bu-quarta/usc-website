<script setup lang="ts">
  import { Calendar } from "lucide-vue-next"

  definePageMeta({
    layout: "pio",
  })

  const { togglePioUploadEventDialog } = useStates()

  const { data, refresh } = await useAsyncData<EventPost[]>("event-posts", () => useSanctumFetch(`/api/pio/event-posts`))

  const groupEvents = computed(() => {
    return data?.value?.reduce((acc, event) => {
      if (!acc[event?.date_posted]) {
        acc[event.date_posted] = []
      }
      acc[event.date_posted]?.push(event)
      return acc
    }, {} as Record<string, EventPost[]>)
  })

  const deleteId = ref(0)
  const event = ref<EventPost>()
</script>

<template>
  <div>
    <div class="text-right">
      <Button @click="togglePioUploadEventDialog = true">
        <Icon name="material-symbols:upload" class="text-lg" />
        <span>Upload</span>
      </Button>
    </div>
    <div v-if="!!data?.length" class="space-y-8 mb-8">
      <template v-for="(events, date) in groupEvents" :key="events">
        <div>
          <div class="flex items-center gap-4 pb-4">
            <h5 class="font-bold">{{ date }}</h5>
            <Separator class="flex-1" />
          </div>
          <div class="grid grid-cols-3 gap-4">
            <template v-for="_event in events" :key="_event">
              <PioEventCard :event="_event" @delete="deleteId = _event.id" @edit="event = _event" />
            </template>
          </div>
        </div>
      </template>
    </div>

    <div v-else class="flex items-center justify-center h-[50vh]">
      <div class="flex flex-col items-center gap-2 text-muted-foreground">
        <component :is="Calendar" />
        <h5 class="text-center">No events found.</h5>
      </div>
    </div>

    <PioDeleteEventDialog :event-id="deleteId" @delete="refresh" />
    <PioUploadEventDialog @upload="refresh" />
    <PioEditEventDialog :event="event as EventPost" @update="refresh" />
  </div>
</template>

<style scoped></style>
