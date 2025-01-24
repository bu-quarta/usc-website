<script setup lang="ts">
  import { Newspaper } from "lucide-vue-next"

  const { data } = await useAsyncData<NewsUpdate[]>("news-updates", () =>
    useSanctumFetch(`/api/news-updates`, {
      query: {
        client: true,
      },
    })
  )

  const firstTwoNews = computed(() => data?.value?.slice(0, 2))
  const nextThreeNews = computed(() => data?.value?.slice(2, 5))
  const restNews = computed(() => data?.value?.slice(5))

  const config = useRuntimeConfig()
</script>

<template>
  <div v-if="!!data?.length">
    <section id="events" class="container px-16 pb-8">
      <div class="flex justify-between">
        <h1 class="text-xl font-bold">News and Updates</h1>
        <div class="relative max-w-sm items-center">
          <Input id="search" type="text" placeholder="Search News and Updates" class="pl-10" />
          <span class="absolute start-0 inset-y-0 flex items-center justify-center px-2">
            <Icon name="lucide:search" class="size-5 text-muted-foreground" />
          </span>
        </div>
      </div>

      <Card class="border-none mt-8">
        <CardContent class="grid grid-cols-6 gap-4">
          <template v-for="news in firstTwoNews" :key="news">
            <NuxtLink :to="`/news-and-updates/${news.slug}`" class="col-span-3">
              <NewsAndUpdateCard :news-update="news" aspect="3/2" clamp="2" />
            </NuxtLink>
          </template>

          <template v-for="news in nextThreeNews" :key="news">
            <NuxtLink :to="`/news-and-updates/${news.slug}`" class="col-span-2">
              <NewsAndUpdateCard :news-update="news" />
            </NuxtLink>
          </template>
        </CardContent>
      </Card>
    </section>

    <section v-if="!!restNews?.length" id="read-more" class="container px-16 pb-4">
      <div class="flex items-center gap-8">
        <p class="text-xl font-bold">Read More</p>
        <Separator class="flex-1" />
      </div>

      <div class="grid lg:grid-cols-4 grid-cols-3 gridcol mt-8 gap-4">
        <template v-for="news in restNews" :key="news">
          <NuxtLink :to="`/news-and-updates/${news.slug}`">
            <NewsAndUpdateCard :news-update="news" />
          </NuxtLink>
        </template>
      </div>
    </section>
  </div>

  <div v-else class="flex items-center justify-center h-[50vh]">
    <div class="flex flex-col items-center gap-2 text-muted-foreground">
      <component :is="Newspaper" />
      <h5 class="text-center">No news and updates found.</h5>
    </div>
  </div>
</template>

<style scoped></style>
