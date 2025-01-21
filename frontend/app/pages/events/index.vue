<script setup lang="ts">
  const { data } = await useAsyncData<EventPost[]>("event-post", () =>
    useSanctumFetch(`/api/event-posts`, {
      query: {
        client: true,
      },
    })
  )

  const firstOngoing = computed(() => data?.value?.find((event) => event.status === "ONGOING"))
  const pastEvents = computed(() => data?.value?.filter((event) => event.status === "PAST"))
  const upcommingOngoingEvents = computed(() =>
    data?.value?.filter((event) => event.status !== "PAST" && event.id !== firstOngoing.value?.id)
  )

  const config = useRuntimeConfig()
  const image_url = computed(() => `${config.public.backendUrl}${firstOngoing.value?.image_url}`)
</script>

<template>
  <div>
    <section id="events" class="container px-16 pb-8">
      <div class="flex justify-between">
        <h1 class="text-xl font-bold">USC Events</h1>
        <div class="relative max-w-sm items-center">
          <Input id="search" type="text" placeholder="Search Events" class="pl-10" />
          <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
            <Icon name="lucide:search" class="size-5 text-muted-foreground" />
          </span>
        </div>
      </div>

      <div class="grid grid-cols-4 mt-8 gap-4">
        <div v-if="firstOngoing" class="col-span-2">
          <NuxtLink :to="`/events/${firstOngoing.slug}`">
            <Card class="border-none">
              <CardContent class="flex flex-col p-0">
                <AspectRatio v-if="image_url" :ratio="2">
                  <NuxtImg :src="image_url" alt="news" class="rounded-md object-cover w-full h-full" />
                </AspectRatio>
                <Skeleton v-else class="flex-1" />

                <div class="space-y-4 text-xs pb-5">
                  <div class="space-y-2 mt-4">
                    <Label class="font-medium uppercase text-xs text-[#FFA200]">Ongoing</Label>
                    <p class="text-lg font-semibold leading-5 truncate">{{ firstOngoing.title }}</p>
                    <p>{{ firstOngoing.date_time }}</p>
                  </div>
                  <div class="flex items-start gap-1">
                    <Icon name="mdi:location" class="size-4" />
                    <p>{{ firstOngoing.location }}</p>
                  </div>
                </div>
              </CardContent>
            </Card>
          </NuxtLink>
        </div>
        <template v-for="upcommingOngoingEvent in upcommingOngoingEvents" :key="upcommingOngoingEvent">
          <NuxtLink :to="`/events/${upcommingOngoingEvent.slug}`">
            <EventCard :event-post="upcommingOngoingEvent" class="col-span-2" />
          </NuxtLink>
        </template>
      </div>
    </section>

    <section v-if="!!pastEvents?.length" id="" class="container px-16 py-8">
      <div class="flex items-center gap-2 pb-8">
        <p class="text-xl font-bold">Past Events</p>
        <Separator class="flex-1" />
      </div>

      <div class="grid grid-cols-4 mt-8 gap-4">
        <template v-for="pastEvent in pastEvents" :key="pastEvent">
          <NuxtLink :to="`/events/${pastEvent.slug}`">
            <EventCard :event-post="pastEvent" past-event />
          </NuxtLink>
        </template>
      </div>
    </section>
  </div>
</template>

<style scoped></style>
