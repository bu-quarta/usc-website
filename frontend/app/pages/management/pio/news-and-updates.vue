<script setup lang="ts">
  import { Newspaper } from "lucide-vue-next"

  definePageMeta({
    layout: "pio",
  })

  const { togglePioUploadNewsAndUpdateDialog } = useStates()
  const { data, refresh } = await useAsyncData<NewsUpdate[]>("news-update", () => useSanctumFetch(`/api/pio/news-updates`))

  const groupedNews = computed(() => {
    return data?.value?.reduce((acc, news) => {
      if (!acc[news?.published_date]) {
        acc[news.published_date] = []
      }
      acc[news.published_date]?.push(news)
      return acc
    }, {} as Record<string, NewsUpdate[]>)
  })

  const deleteId = ref<number>(0)
  const newsUpdate = ref<NewsUpdate>()
</script>

<template>
  <div>
    <div class="text-right">
      <Button @click="togglePioUploadNewsAndUpdateDialog = true">
        <Icon name="material-symbols:upload" class="text-lg" />
        <span>Upload</span>
      </Button>
    </div>
    <div v-if="!!data?.length" class="space-y-8 mb-8">
      <template v-for="(news, date) in groupedNews" :key="date">
        <div>
          <div class="flex items-center gap-4 pb-4">
            <h5 class="font-bold">{{ date }}</h5>
            <Separator class="flex-1" />
          </div>
          <div class="grid grid-cols-3 gap-4">
            <template v-for="_news in news" :key="_news">
              <PioNewsAnUpdatetCard :news-updates="_news" @delete="deleteId = _news.id" @edit="newsUpdate = _news" />
            </template>
          </div>
        </div>
      </template>
    </div>

    <div v-else class="flex items-center justify-center h-[50vh]">
      <div class="flex flex-col items-center gap-2 text-muted-foreground">
        <component :is="Newspaper" />
        <h5 class="text-center">No news and updates found.</h5>
      </div>
    </div>

    <PioDeleteNewsAndUpdateDialog :news-update-id="deleteId" @delete="refresh" />
    <PioUploadNewsAndUpdateDialog @upload="refresh" />
    <PioEditNewsAndUpdateDialog :news-update="newsUpdate as NewsUpdate" @update="refresh()" />
  </div>
</template>

<style scoped></style>
