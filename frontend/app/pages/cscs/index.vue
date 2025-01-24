<script setup lang="ts">
  const { data: cscs } = useAsyncData<CscDirectory[]>("cscs", () => useSanctumFetch("/api/cscs"))

  const config = useRuntimeConfig()
</script>

<template>
  <div class="font-light container px-16">
    <section id="intro" class="pb-8 space-y-2">
      <p class="font-bold text-xl">College Student Councils (CSCs)</p>
      <p class="grid grid-cols-2">
        College Student Councils are student-led government organizations that function within the specific scope of their respective
        colleges or academic units. Their primary purpose is to address and cater to the needs, concerns, and interests of the students
        enrolled in their college. They serve as the primary liaison between the student body and the college administration.
      </p>
    </section>

    <section id="content" class="py-8 container px-16 grid grid-cols-4 gap-4">
      <template v-for="csc in cscs" :key="csc">
        <NuxtLink :to="`/cscs/${csc.slug}`">
          <Card class="border-none">
            <CardContent class="items-center justify-center space-y-2 p-0">
              <div class="w-full">
                <div
                  class="flex items-center justify-center rounded-md aspect-[4/5] w-full bg-[linear-gradient(220deg,rgba(234,167,51,1)_0%,rgba(0,153,203,1)_100%)]"
                >
                  <div v-if="csc.image_url" class="w-3/4">
                    <AspectRatio>
                      <NuxtImg :src="config.public.backendUrl + csc.image_url" />
                    </AspectRatio>
                  </div>

                  <Skeleton v-else class="rounded-full aspect-square w-3/4" />
                </div>
              </div>
              <div class="text-xs space-y-2 select-none text-center">
                <p class="font-medium text-sm">{{ csc.name }}</p>
              </div>
            </CardContent>
          </Card>
        </NuxtLink>
      </template>
    </section>
  </div>
</template>

<style scoped></style>
