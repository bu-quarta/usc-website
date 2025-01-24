<script setup lang="ts">
  import { Slack } from "lucide-vue-next"

  interface CscDetail {
    csc: CscDirectory
    csc_officials: CscOfficial[]
  }

  const slug = useRoute().params.slug as string
  const { data } = await useAsyncData<CscDetail>(slug, () => useSanctumFetch(`/api/cscs/${slug}`))

  const config = useRuntimeConfig()
  const image_url = config.public.backendUrl + data.value?.csc.image_url
</script>

<template>
  <div v-if="!!data" class="font-light">
    <section id="intro" class="pb-8 container space-y-2 px-16 flex gap-40">
      <div class="space-y-4">
        <div>
          <p class="font-bold text-xl uppercase">{{ data?.csc.abbr }}</p>
          <p class="font-medium my-2">{{ data?.csc.name }} College Student Council</p>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla hendrerit ligula in quam sagittis elementum. Curabitur non
            pretium velit. Etiam in lobortis mauris. Nulla ornare mi eu sapien imperdiet, id varius justo fringilla. Nullam vitae lacinia
            libero. Vestibulum in nisi leo.
          </p>
        </div>
        <Card class="border-none">
          <CardContent class="space-y-2">
            <div class="flex items-start gap-1">
              <div>
                <Icon name="mdi:location" class="h-4 w-4" />
              </div>
              <p>
                Office Location, Cras magna purus, suscipit at molestie at, laoreet sit amet mi. Nunc porttitor rutrum sapien lacinia
                efficitur
              </p>
            </div>
            <div class="flex items-center gap-1">
              <Icon name="ic:baseline-email" class="h-4 w-4" />
              <p>example.org@email.com</p>
            </div>
            <div class="flex items-center gap-1">
              <Icon name="mynaui:telephone-solid" class="h-4 w-4" />
              <p>09123456789</p>
            </div>
          </CardContent>
        </Card>
      </div>
      <div class="w-[500px]">
        <div
          class="flex items-center justify-center rounded-full aspect-square w-full bg-[linear-gradient(220deg,rgba(234,167,51,1)_0%,rgba(0,153,203,1)_100%)]"
        >
          <div v-if="image_url" class="w-3/4">
            <AspectRatio>
              <NuxtImg :src="image_url" />
            </AspectRatio>
          </div>

          <Skeleton v-else class="rounded-full aspect-square w-3/4" />
        </div>
      </div>
    </section>

    <section id="official_directory" class="container px-16 py-8">
      <div class="text-center">
        <div class="grid grid-cols-[1fr_auto_1fr] items-center gap-2">
          <Separator />
          <p class="text-lg font-medium">OFFICIAL DIRECTORY</p>
          <Separator />
        </div>
        <p class="text-xs font-light">ACADEMIC YEAR 2024-2025</p>
      </div>

      <div class="flex gap-4 mt-8">
        <div class="mx-auto my-4 flex flex-wrap w-full justify-center gap-4 px-8">
          <template v-for="csc_official in data?.csc_officials" :key="csc_official">
            <Card class="aspect-[3/1] w-[calc(30%_-_4px)] border border-black">
              <CardContent class="space-y-2 py-4 text-center">
                <div>
                  <p class="capitalize text-lg font-medium">{{ csc_official.name }}</p>
                  <p>{{ csc_official.position }}</p>
                </div>
                <p>{{ csc_official.email }}</p>
              </CardContent>
            </Card>
          </template>
        </div>
      </div>
    </section>
  </div>

  <div v-else class="h-[50vh] flex items-center justify-center">
    <div class="flex flex-col items-center gap-2 text-muted-foreground">
      <component :is="Slack" />
      <h5 class="text-center">CSC not found.</h5>
    </div>
  </div>
</template>

<style scoped></style>
